<?php

namespace WPOP\V_4_0;

/**
 * Class Multiselect
 * @package WPOP\V_3_0
 */
class Multiselect extends Part {

	public $values;
	public $meta;
	public $allow_reordering = false;
	public $create_options = false;
	public $input_type = 'multiselect';
	public $data_store = true;


	public function __construct( $i, $m ) {
		parent::__construct( $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	public function render() {
		$stored = ! empty( $this->saved ) ? json_decode( $this->saved ) : false; ?>
		<select id="<?php esc_attr_e( $this->id ); ?>" name="<?php esc_attr_e( $this->id ); ?>[]"
			multiple="multiple" data-multiselect="1">
		<?php
		if ( ! empty( $stored ) && is_array( $stored ) ) {
			foreach ( $stored as $key ) {
				?><option value="<?php esc_attr_e( $key ); ?>" selected="selected">
					<?php esc_html_e( $this->values[ $key ]); unset( $this->values[ $key ] ); ?>
				</option>
			<?php }
		}
		if ( ! empty( $this->values ) && is_array( $this->values ) ) {
			foreach ( $this->values as $key => $value ) {
				?><option value="<?php esc_attr_e( $key ); ?>">
					<?php esc_html_e( $value); ?>
				</option>
			<?php
			}
		}
		echo "</select>";
	}

}