<?php
/**
 * Text (Field)
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

/**
 * Class Text
 */
class Text extends Part {
	/**
	 * Input Type
	 *
	 * @var string
	 */
	public $input_type = 'text';

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
