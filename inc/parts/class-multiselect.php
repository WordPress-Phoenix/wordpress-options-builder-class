<?php

namespace WPOP\V_4_1;

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
		<select id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>[]"
			multiple="multiple" data-multiselect="1">
		<?php
		if ( ! empty( $stored ) && is_array( $stored ) ) {
			foreach ( $stored as $key ) {
				?><option value="<?php echo esc_attr( $key ); ?>" selected="selected">
					<?php echo esc_html( $this->values[ $key ]); unset( $this->values[ $key ] ); ?>
				</option>
			<?php }
		}
		if ( ! empty( $this->values ) && is_array( $this->values ) ) {
			foreach ( $this->values as $key => $value ) {
				?><option value="<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $value); ?>
				</option>
			<?php
			}
		}
		echo "</select>";
	}

}
