<?php

namespace WPOP\V_4_0;

/**
 * Class Input
 * @package WPOP\V_4_0
 */
class Input extends Part {
	public $input_type;
	public $data_store = true;
	public function render() {
		$this->input();
	}

}