<?php

namespace WPOP\V_4_0;

class Part {

	public $id;
	public $field_id;
	public $saved;
	public $part_type = 'option';
	public $label = 'Option';
	public $description = '';
	public $default_value = '';
	public $classes = array();
	public $atts = [];
	public $data_store = false;
	public $panel_api = false;
	public $panel_id = false;
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
		$established     = ( false === $this->saved || empty( $this->saved ) ) ? $this->default_value : $this->saved;
		$value           = ! empty( $stored ) ? $stored : $established;
		$clean_classname = strtolower( $this->get_clean_classname() );
		$class_str       = ! empty( $this->classes ) && is_array( $this->classes ) ? implode( ' ', $this->classes ) : '';

		echo '<input id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_id ) . '"' .
		     ' type="' . esc_attr( $type ) . '" value="' . esc_attr( $value ) . '" autocomplete="false" data-part="'
		     . esc_attr( $clean_classname ) . '" class="' . esc_attr( $class_str ) . '" />';
	}

	public function run_save_process() {
		if ( ! isset( $_POST['submit'] )
		     || ! is_string( $_POST['submit'] )
		     || 'Save All' !== $_POST['submit']
		) {
			return false; // only run logic if submiting
		}
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], $this->panel_id ) ) {
			return false; // check for nonce
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

		switch ( $this->panel_api ) {
			case 'post':
				$obj_id = isset( $_GET['post'] ) ? filter_input( INPUT_GET, 'post' ) : null;
				break;
			case 'term':
				$obj_id = isset( $_GET['term'] ) ? filter_input( INPUT_GET, 'term' ) : null;
				break;
			case 'user':
			case 'user-network':
				$obj_id = isset( $_GET['user'] ) ? filter_input( INPUT_GET, 'user' ) : null;
				break;
			case 'network':
			case 'site':
			default:
				$obj_id = null;
				break;
		}

		$response = new Read(
			$this->panel_id,
			$this->panel_api,
			$this->id,
			$this->default_value,
			$obj_id
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
		switch ( $input_type ) {
			case 'password':
				if ( $_POST[ 'stored_' . $id ] === $value && ! empty( $value ) ) {
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
