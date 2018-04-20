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
		<textarea id="<?php esc_attr_e( $this->id ); ?>" name="<?php esc_attr_e( $this->id ); ?>"
		          cols="<?php esc_attr_e( $this->cols ); ?>" rows="<?php esc_attr_e( $this->rows ); ?>"
		><?php echo stripslashes( $this->saved ); ?></textarea>
		<?php
	}

}
