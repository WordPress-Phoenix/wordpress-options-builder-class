<?php

namespace WPOP\V_4_0;

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
		><?php echo stripslashes( $this->saved ); ?></textarea>
		<?php
	}

}
