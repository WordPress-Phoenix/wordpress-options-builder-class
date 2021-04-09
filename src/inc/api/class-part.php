<?php
/**
 * Part (usually section or field)
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Part
 */
abstract class Part {

	/**
	 * Unique ID for the part - db store key for keystore parts.
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Field ID - currently used for Radio Buttons
	 *
	 * @var string
	 */
	public $field_id;

	/**
	 * The value of this part if data was stored in the database.
	 *
	 * @var mixed|string
	 */
	public $saved;

	/**
	 * Type of part (partial)
	 *
	 * @var string
	 */
	public $part_type = 'option';

	/**
	 * Input or form type - for field parts.
	 *
	 * @var string
	 */
	public $input_type = 'hidden';

	/**
	 * Part label or title.
	 *
	 * @var string
	 */
	public $label = 'Option';

	/**
	 * Part description is usually printed in small text near the partial.
	 *
	 * @var string
	 */
	public $description = '';

	/**
	 * Default value associated with form parts that have database values.
	 *
	 * @var string
	 */
	public $default_value = '';

	/**
	 * HTML classes to associate with parts wrappers.
	 *
	 * @var array
	 */
	public $classes = [];

	/**
	 * Enable this if the part needs to run save/get operations.
	 *
	 * @var bool
	 */
	public $data_store = false;

	/**
	 * CRUD API
	 *
	 * @var bool
	 */
	public $data_api = 'site';

	/**
	 * Page Slug is the ID of the page where the part lives
	 *
	 * @var bool
	 */
	public $page_slug = false;

	/**
	 * Object ID
	 *
	 * @var null
	 */
	public $obj_id = null;

	/**
	 * Type of update recorded for notifications
	 *
	 * @var string
	 */
	public $update_type = '';

	/**
	 * Value of part from DB
	 *
	 * @var string
	 */
	public $value = '';

	/**
	 * Status of save options execution.
	 *
	 * @var bool|int
	 */
	public $updated;

	/**
	 * Status of save options execution.
	 *
	 * @var \WPOP\V_5_0\Section
	 */
	public $section;

	/**
	 * Part constructor.
	 *
	 * @param \WPOP\V_5_0\Section $section    Reference to section object where this part lives.
	 * @param string              $field_slug Section page URL.
	 * @param array               $params     Page params.
	 */
	public function __construct( &$section, $field_slug, $params = [] ) {
		$this->section  = $section;
		$this->id       = $field_slug;
		$this->field_id = $this->id;

		foreach ( $params as $name => $value ) {
			$this->$name = $value;
		}
		$this->maybe_process_update();
	}

	/**
	 * Blocks attempting updates to fields unless POST event is happening and part has "data_store" set to true
	 */
	public function maybe_process_update() {
		// Confirms both that POST is happening and that _wpnonce was sent, otherwise returns false to not try updates.
		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return false;
		}
		$wpnonce = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;

		// Only allow class to be used by panel OR encrypted pwds never updated after insert.
		if ( empty( $wpnonce ) || wp_verify_nonce( $wpnonce ) ) {
			return false;
		}

		if ( ! empty( $_POST ) && $this->data_store ) {
			$old_value     = $this->get_saved();
			$this->updated = $this->run_save_process();
			$this->saved   = $this->get_saved();
			if ( empty( $old_value ) && $this->updated && ! empty( $this->saved ) ) {
				$this->update_type = 'created';
			} elseif ( ! empty( $old_value ) && $this->updated && ! empty( $this->saved ) && ( $old_value !== $this->saved )
			) {
				$this->update_type = 'updated';
			} elseif ( ! empty( $old_value ) && $this->updated && empty( $this->saved ) ) {
				$this->update_type = 'deleted';
			}
		}
	}

	/**
	 * Standardize and return classname value.
	 *
	 * @return mixed
	 */
	public function get_clean_classname() {
		$classname_array = explode( '\\', get_called_class() );

		return $classname_array[ count( $classname_array ) - 1 ];
	}

	/**
	 * Dom element printer for <input> html tag
	 *
	 * @param string $field_id   ID of the field.
	 * @param string $type       Type of field.
	 * @param array  $attributes Array of optional attributes for a field.
	 */
	public function input( $field_id = '', $type = '', $attributes = [] ) {
		$field_id        = ! empty( $field_id ) ? $field_id : $this->field_id;
		$type            = ! empty( $type ) ? $type : $this->input_type;
		$established     = ( false === $this->get_saved() || empty( $this->get_saved() ) ) ? $this->default_value : $this->get_saved();
		$clean_classname = strtolower( $this->get_clean_classname() );
		$class_str       = ! empty( $this->classes ) && is_array( $this->classes ) ? implode( ' ', $this->classes ) : '';

		// Set some default attributes.
		$attributes = wp_parse_args(
			$attributes,
			[
				'disabled' => false,
				'readonly' => false,
			]
		);
		?>
		<input
				id="<?php echo esc_attr( $field_id ); ?>"
				name="<?php echo esc_attr( $field_id ); ?>"
				type="<?php echo esc_attr( $type ); ?>"
				autocomplete="new-password"
		<?php echo boolval( $attributes['disabled'] ) ? 'disabled="disabled"' : ''; ?>"
		<?php echo boolval( $attributes['readonly'] ) ? 'readonly="readonly"' : ''; ?>"
		data-part="<?php echo esc_attr( $clean_classname ); ?>"
		title="<?php echo esc_attr( $field_id ); ?>"
		class="<?php echo esc_attr( $class_str ); ?>"
		<?php $this->input_value( $type, $established ); ?>
		/>
		<?php
	}

	/**
	 * Standardized function to retrieve and output html form values from DB data.
	 *
	 * @param string $type             Type of input field.
	 * @param string $established_data Either saved data or default value for field.
	 * @param bool   $use_data_value   TODO: Use Data Value?.
	 */
	public function input_value( $type, $established_data, $use_data_value = false ) {
		if ( 'checkbox' === $type || 'toggle-switch' === $type || true === $use_data_value ) {
			echo ' data-value="' . esc_attr( $established_data ) . '"';
			checked( $this->value, $established_data );
		} else {
			echo ' value="' . esc_attr( $established_data ) . '"';
		}
	}

	/**
	 * Run Save DB Values Process
	 *
	 * @return bool|string
	 */
	public function run_save_process() {
		$nonce               = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;
		$page_slug_as_action = $this->section->panel->page->slug;
		if ( empty( $nonce ) || false === wp_verify_nonce( $nonce, $page_slug_as_action ) ) {
			return false; // Only run logic if asked to run & auth'd by nonce.
		}

		$type = ( ! empty( $this->field_type ) ) ? $this->field_type : $this->input_type;

		$field_input = isset( $_POST[ $this->id ] ) ? filter_input( INPUT_POST, $this->id ) : false;

		$sanitize_input = $this->sanitize_data_input( $type, $this->id, $field_input );

		$updated = new Update(
			$this->section->panel->page->slug, // Used to check nonce.
			$this->data_api, // Doing this way to allow multi-api saving from single section down-the-road.
			$this->id, // This is the data storage key in the database.
			$sanitize_input, // Sanitized input (maybe empty, triggering delete).
			isset( $this->obj_id ) ? $this->obj_id : null // Maybe an object ID needed for metadata API.
		);

		if ( $updated ) {
			return $this->id;
		}

		return false;
	}

	/**
	 * Read in value related to object.
	 *
	 * @return mixed|string
	 */
	public function get_saved() {
		$response = new Read(
			$this->page_slug,
			$this->data_api,
			$this->id,
			$this->default_value,
			$this->obj_id
		);

		return $response->response;
	}

	/**
	 * Main sanitization function used to clean user input
	 *
	 * @param string $input_type Input Type.
	 * @param string $id         ID.
	 * @param string $value      Value.
	 *
	 * @return bool|string
	 * @throws \Exception Custom error output.
	 */
	protected function sanitize_data_input( $input_type, $id, $value ) {
		// Confirms both that POST is happening and that _wpnonce was sent, otherwise returns false to not try updates.
		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return false;
		}
		$wpnonce = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;

		// Only allow class to be used by panel OR encrypted pwds never updated after insert.
		if ( empty( $wpnonce ) || wp_verify_nonce( $wpnonce ) ) {
			return false;
		}

		switch ( $input_type ) {
			case 'password':
				$hidden_pwd_field = isset( $_POST[ 'stored_' . $id ] ) ? filter_input( INPUT_POST, 'stored_' . $id ) : null;

				if ( $hidden_pwd_field === $value && ! empty( $value ) ) {
					return '### wpop-encrypted-pwd-field-val-unchanged ###';
				}

				return ! empty( $value ) ? \WPOP\V_5_0\Fields\Password::encrypt( $value ) : false;
			case 'media':
				return absint( $value );
			case 'color':
				return sanitize_hex_color_no_hash( $value );
			case 'editor':
				return wp_filter_post_kses( $value );
			case 'textarea':
				return sanitize_textarea_field( $value );
			case 'checkbox':
			case 'toggle_switch':
				return sanitize_key( $value );
			case 'multiselect':
				if ( ! empty( $value ) && is_array( $value ) ) {
					return wp_json_encode( array_map( 'sanitize_key', $value ) );
				}

				return false;
			case 'email':
				return sanitize_email( $value );
			case 'url':
				return esc_url_raw( $value );
			case 'text':
			default:
				return sanitize_text_field( $value );
		}
	}

	/**
	 * Render is an output placeholder for sub parts.
	 */
	abstract public function render();

}
