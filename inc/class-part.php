<?php

namespace WPOP\V_4_1;

class Part {

	public $id;
	public $field_id;
	public $saved;
	public $part_type = 'option';
	public $input_type = 'hidden';
	public $label = 'Option';
	public $description = '';
	public $default_value = '';
	public $classes = array();
	public $atts = [];
	public $data_store = false;
	public $panel_api = false;
	public $panel_id = false;
	public $obj_id = null;
	public $update_type = '';

	public function __construct( $i, $args = [] ) {
		$this->id       = $i;
		$this->field_id = $this->id;

		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}

		if ( $this->data_store ) {
			$old_value     = $this->get_saved();
			$this->updated = $this->run_save_process();
			$this->saved   = $this->get_saved();
			if ( empty( $old_value ) && $this->updated && ! empty( $this->saved ) ) {
				$this->update_type = 'created';
			} elseif ( ! empty( $old_value ) && $this->updated && ! empty( $this->saved )
			           && ( $old_value !== $this->saved )
			) {
				$this->update_type = 'updated';
			} elseif ( ! empty( $old_value ) && $this->updated && empty( $this->saved ) ) {
				$this->update_type = 'deleted';
			}
		}
	}

	public function get_clean_classname() {
		return explode( '\\', get_called_class() )[2];
	}

	public function input( $field_id = '', $type = '', $stored = '' ) {
		$field_id        = ! empty( $field_id ) ? $field_id : $this->field_id;
		$type            = ! empty( $type ) ? $type : $this->input_type;
		$established     = ( false === $this->get_saved() || empty( $this->get_saved() ) ) ? $this->default_value : $this->get_saved();
		$value           = ! empty( $stored ) ? $stored : $established;
		$clean_classname = strtolower( $this->get_clean_classname() );
		$class_str       = ! empty( $this->classes ) && is_array( $this->classes ) ? implode( ' ', $this->classes ) : '';
		?>
		<input id="<?php echo esc_attr( $field_id ); ?>" name="<?php echo esc_attr( $field_id ); ?>"
			   type="<?php echo esc_attr( $type ); ?>" autocomplete="false"
			   data-part="<?php echo esc_attr( $clean_classname ); ?>"
			   class="<?php echo esc_attr( $class_str ); ?>"
			<?php $this->input_value( $type, $established ); ?> />
		<?php
	}

	/**
	 * @param $type             string - type of input field
	 * @param $established_data string - either saved data or default value for field
	 * @param $use_data_value   bool
	 */
	public function input_value( $type, $established_data, $use_data_value = false ) {
		if ( 'checkbox' === $type || 'toggle-switch' === $type || true === $use_data_value ) {
			echo ' data-value="' . esc_attr( $established_data ) . '"';
			checked( $this->value, $established_data );
		} else {
			echo ' value="' . esc_attr( $established_data ) . '"';
		}
	}

	public function run_save_process() {
		$nonce = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;
		if ( empty( $nonce ) || false === wp_verify_nonce( $nonce, $this->panel_id ) ) {
			return false; // only run logic if asked to run & auth'd by nonce
		}

		$type = ( ! empty( $this->field_type ) ) ? $this->field_type : $this->input_type;

		$field_input = isset( $_POST[ $this->id ] ) ? $_POST[ $this->id ] : false;

		$sanitize_input = $this->sanitize_data_input( $type, $this->id, $field_input );

		$updated = new Update(
			$this->panel_id, // used to check nonce
			$this->panel_api, // doing this way to allow multi-api saving from single panel down-the-road
			$this->id, // this is the data storage key in the database
			$sanitize_input, // sanitized input (maybe empty, triggering delete)
			isset( $this->obj_id ) ? $this->obj_id : null // maybe an object ID needed for metadata API
		);

		if ( $updated ) {
			return $this->id;
		}

		return false;
	}

	public function get_saved() {


		$response = new Read(
			$this->panel_id,
			$this->panel_api,
			$this->id,
			$this->default_value,
			$this->obj_id
		);

		return $response->response;
	}

	/**
	 * Master sanitization function used to clean user input
	 *
	 * @param $input_type
	 * @param $id
	 * @param $value
	 *
	 * @return bool|string
	 */
	protected function sanitize_data_input( $input_type, $id, $value ) {
		// codesniffer is being annoying and wants another nonce check
		$nonce = ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;
		if ( empty( $nonce ) || ! wp_verify_nonce( $nonce, $this->panel_id ) ) {
			return false; // only run logic if asked to run & auth'd by nonce
		}
		switch ( $input_type ) {
			case 'password':
				$hidden_pwd_field = isset( $_POST[ 'stored_' . $id ] ) ? filter_input( INPUT_POST, 'stored_' . $id ) : null;
				if ( $hidden_pwd_field === $value && ! empty( $value ) ) {
					return '### wpop-encrypted-pwd-field-val-unchanged ###';
				}

				return ! empty( $value ) ? Password::encrypt( $value ) : false;
				break;
			case 'media':
				return absint( $value );
				break;
			case 'color':
				return sanitize_hex_color_no_hash( $value );
				break;
			case 'editor':
				return wp_filter_post_kses( $value );
				break;
			case 'textarea':
				return sanitize_textarea_field( $value );
				break;
			case 'checkbox':
			case 'toggle_switch':
				return sanitize_key( $value );
				break;
			case 'multiselect':
				if ( ! empty( $value ) && is_array( $value ) ) {
					return json_encode( array_map( 'sanitize_key', $value ) );
				}

				return false;
				break;
			case 'email':
				return sanitize_email( $value );
				break;
			case 'url':
				return esc_url_raw( $value );
				break;
			case 'text':
			default:
				return sanitize_text_field( $value );
				break;
		}
	}

}
