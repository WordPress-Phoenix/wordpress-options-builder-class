<?php

namespace WPOP\V_4_0;

/**
 * Class Input
 * @package WPOP\V_4_0
 */
class Input extends Part {
	/**
	 * @var
	 */
	public $input_type;
	/**
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
