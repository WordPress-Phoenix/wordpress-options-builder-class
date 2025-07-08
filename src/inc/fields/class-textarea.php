<?php
/**
 * Textarea
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

/**
 * Class Textarea
 */
class Textarea extends Part {

	/**
	 * Number of textarea columns.
	 *
	 * @var int
	 */
	public $cols;

	/**
	 * Number of rows of the textarea.
	 *
	 * @var int
	 */
	public $rows;

	/**
	 * Intput type.
	 *
	 * @var string
	 */
	public $input_type = 'textarea';

	/**
	 * Instructs parent class to save form values in DB.
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Main render function.
	 */
	public function render() {
		$this->cols = ! empty( $this->cols ) ? $this->cols : 80;
		$this->rows = ! empty( $this->rows ) ? $this->rows : 10;

		printf(
			'<textarea title="%1$s" id="%1$s" name="%1$s" cols="%2$d" rows="%3$d">%4$s</textarea>',
			esc_attr( $this->id ),
			esc_attr( $this->cols ),
			esc_attr( $this->rows ),
			esc_html( $this->get_saved() )
		);
	}
}
