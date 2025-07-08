<?php
/**
 * Multiselect
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;
use WPOP\V_5_0\Update;

/**
 * Class Multiselect
 */
class Multiselect extends Part {

	/**
	 * Value options for select
	 *
	 * @var array
	 */
	public $values;

	/**
	 * Meta
	 *
	 * @var array
	 */
	public $meta;

	/**
	 * Allow reordering status
	 *
	 * @var bool
	 */
	public $allow_reordering = false;

	/**
	 * Allow creating options status
	 *
	 * @var bool
	 */
	public $create_options = false;

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'multiselect';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Multiselect constructor.
	 *
	 * @param \WPOP\V_5_0\Section $section Reference to the parent object (Panel) where this section lives.
	 * @param string              $i Slug or ID.
	 * @param array               $m Meta values.
	 */
	public function __construct( &$section, $i, $m ) {
		parent::__construct( $section, $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	/**
	 * Run Save DB Values Process
	 *
	 * @return bool|string
	 */
	public function run_save_process() {
		$nonce = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;
		if ( empty( $nonce ) || false === wp_verify_nonce( $nonce, $this->section->panel->page->slug ) ) {
			return false; // Only run logic if asked to run & auth'd by nonce.
		}

		$type = ( ! empty( $this->field_type ) ) ? $this->field_type : $this->input_type;

		$field_input = isset( $_POST[ $this->id ] ) ? filter_input( INPUT_POST, $this->id, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY ) : false;

		$sanitize_input = $this->sanitize_data_input( $type, $this->id, $field_input );

		$update_obj = new Update();
		$updated    = $update_obj->get_save_data(
			$this->section->panel->page->slug, // Used to check nonce.
			$this->data_api, // Doing this way to allow multi-api saving from single panel down-the-road.
			$this->id, // This is the data storage key in the database.
			$sanitize_input, // Sanitized input (maybe empty, triggering delete).
			isset( $this->obj_id ) ? $this->obj_id : null // Maybe an object ID needed for metadata API.
		);

		if ( empty( $updated ) || is_wp_error( $updated ) ) {
			return false;
		}

		return $this->id;
	}

	/**
	 * Main render function.
	 */
	public function render() {
		$stored = ! empty( $this->get_saved() ) ? json_decode( $this->get_saved() ) : false;
		?>
		<select title="<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>[]" multiple="multiple" data-multiselect="1">
		<?php
		if ( ! empty( $stored ) && is_array( $stored ) ) :
			foreach ( $stored as $key ) :
				?>
				<option value="<?php echo esc_attr( $key ); ?>" selected="selected">
					<?php
					echo esc_html( $this->values[ $key ] );
					unset( $this->values[ $key ] );
					?>
				</option>
				<?php
			endforeach;
		endif;
		if ( ! empty( $this->values ) && is_array( $this->values ) ) {
			foreach ( $this->values as $key => $value ) {
				?>
				<option value="<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $value ); ?>
				</option>
				<?php
			}
		}
		echo '</select>';
	}
}
