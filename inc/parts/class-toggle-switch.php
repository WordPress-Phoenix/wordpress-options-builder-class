<?php

namespace WPOP\V_4_1;

/**
 * Class Toggle_Switch
 * @package WPOP\V_3_0
 */
class Toggle_Switch extends Checkbox {
	/**
	 * @var string
	 */
	public $input_type = 'toggle_switch';

	/**
	 * Toggle_Switch constructor.
	 *
	 * @param       $i
	 * @param array $args
	 */
	public function __construct( $i, array $args = [] ) {
		parent::__construct( $i, $args );
		$this->classes = array( 'onOffSwitch-checkbox' );
	}

	/**
	 * Markup used to create Toggle Switch using CSS based on checked state of hidden checkbox
	 */
	public function label_markup() {
		?>
		<label class="onOffSwitch-label" for="<?php echo esc_attr( $this->id ); ?>">
			<div class="onOffSwitch-inner"></div><span class="onOffSwitch-switch"></span>
		</label>
		<?php
	}
}
