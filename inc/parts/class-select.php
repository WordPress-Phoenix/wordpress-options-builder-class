<?php

namespace WPOP\V_4_1;

/**
 * Class Select
 * @package WPOP\V_3_0
 */
class Select extends Part {

	public $values;
	public $meta;
	public $empty_default = true;
	public $input_type    = 'select';
	public $data_store    = true;

	public function __construct( $i, $m ) {
		parent::__construct( $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	public function render() {
		$default_option = isset( $this->meta['option_default'] ) ? $this->meta['option_default'] : 'Select an option'; ?>
		<select id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
				data-select="true" data-placeholder="<?php echo esc_attr( $default_option ); ?>">
			<?php if ( $this->empty_default ) { ?>
				<option value=""></option>
			<?php
}
foreach ( $this->values as $value => $label ) {
			?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $this->get_saved() ); ?>>
					<?php echo esc_html( $label ); ?>
				</option>
			<?php
}
			?>
		</select>
		<?php
	}

}
