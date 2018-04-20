<?php

namespace WPOP\V_4_0;

/**
 * Class Toggle_Switch
 * @package WPOP\V_3_0
 */
class Toggle_Switch extends Checkbox {
	public $input_type = 'toggle_switch';

	public function __construct( $i, array $args = [] ) {
		parent::__construct( $i, $args );
		$this->classes = 'onOffSwitch-checkbox';
	}

	public function label_markup() {
		?>
		<label class="onOffSwitch-label" for="<?php esc_attr_e( $this->id ); ?>">
			<div class="onOffSwitch-inner"></div><span class="onOffSwitch-switch"></span>
		</label>
		<?php
	}
}
