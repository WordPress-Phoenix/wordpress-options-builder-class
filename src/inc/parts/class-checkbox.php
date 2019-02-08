<?php
/**
 * Checkbox
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Checkbox
 */
class Checkbox extends Part {


	/**
	 * Optional array of input attributes
	 *
	 * @var array
	 */
	public $attributes = [];

	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = 'on';

	/**
	 * Input type for form field.
	 *
	 * @var string
	 */
	public $input_type = 'checkbox';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Used by extending Toggle_Switch class
	 */
	public function label_markup() {
		return '';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		?>
		<div class="cb-wrap">
		<?php
		$this->input( esc_attr( $this->id ), 'checkbox', $this->attributes );
		$this->label_markup();
		?>
		</div>
		<?php
	}

}
