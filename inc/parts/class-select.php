<?php

namespace WPOP\V_4_0;

/**
 * Class Select
 * @package WPOP\V_3_0
 */
class Select extends Part {

	public $values;
	public $meta;
	public $empty_default = true;
	public $input_type = 'select';
	public $data_store = true;

	public function __construct( $i, $m ) {
		parent::__construct( $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	public function render() {
		$default_option = isset( $this->meta['option_default'] ) ? $this->meta['option_default'] : 'Select an option'; ?>
		<select id="<?php esc_attr_e( $this->id ); ?>" name="<?php esc_attr_e( $this->id ); ?>"
		        data-select="true" data-placeholder="<?php esc_attr_e( $default_option ); ?>">
			<?php if ( $this->empty_default ) { ?>
				<option value=""></option>
			<?php }
			foreach ( $this->values as $value => $label ) { ?>
				<option value="<?php esc_attr_e( $value ); ?>" <?php selected( $value, $this->get_saved() ); ?>>
					<?php esc_html_e( $label ); ?>
				</option>
			<?php } ?>
		</select>
		<?php
	}

}