<?php
/**
 * Input (Default field object)
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Input
 */
class Input extends Part {

	/**
	 * Input Type
	 *
	 * @var string
	 */
	public $input_type;

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
