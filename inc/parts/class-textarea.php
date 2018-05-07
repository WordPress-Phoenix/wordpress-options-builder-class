<?php

namespace WPOP\V_4_1;

/**
 * Class Textarea
 * @package WPOP\V_3_0
 */
class Textarea extends Part {

	public $cols;
	public $rows;
	public $input_type = 'textarea';
	public $data_store = true;

	public function render() {
		$this->cols = ! empty( $this->cols ) ? $this->cols : 80;
		$this->rows = ! empty( $this->rows ) ? $this->rows : 10;
		?>
		<textarea id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
				  cols="<?php echo esc_attr( $this->cols ); ?>" rows="<?php echo esc_attr( $this->rows ); ?>"
		><?php echo esc_html( esc_html( $this->saved ) ); ?></textarea>
		<?php
	}

}
