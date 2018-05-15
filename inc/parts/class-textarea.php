<?php
/**
 * Textarea
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_4_1;

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
		?><textarea title="<?php echo esc_attr( $this->id ); ?>"
					id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
					cols="<?php echo esc_attr( $this->cols ); ?>" rows="<?php echo esc_attr( $this->rows ); ?>">
		<?php
		echo esc_html( $this->saved );
		?>
		</textarea>
		<?php
	}

}
