<?php
/**
 * URL
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

/**
 * Class Url
 */
class Url extends Part {
	/**
	 * Input Type
	 *
	 * @var string
	 */
	public $input_type = 'url';

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
