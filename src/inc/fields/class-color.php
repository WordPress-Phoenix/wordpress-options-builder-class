<?php
/**
 * Color
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

/**
 * Class Color
 */
class Color extends Part {
	/**
	 * HTML form input field type.
	 *
	 * @var string
	 */
	public $input_type = 'text';

	/**
	 * Field Type
	 *
	 * @var string
	 */
	public $field_type = 'color';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Main render function, uses Part->input() method
	 */
	public function render() {
		$this->input();
	}
}
