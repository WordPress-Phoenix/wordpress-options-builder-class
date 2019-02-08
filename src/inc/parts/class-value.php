<?php
/**
 * String
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Include_Partial
 *
 * @package WPOP\V_5_0
 */
class Value extends Part {


	/**
	 * String value
	 *
	 * @var string
	 */
	public $value = '';

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'value';

	/**
	 * Main render function.
	 */
	public function render() {
		// Guard clause to return early if we don't have a value.
		if ( empty( $this->value ) ) {
			return;
		}

		echo sprintf(
			'<span class="%1$s">%2$s</span>',
			esc_attr( $this->get_clean_classname() ),
			wp_kses( $this->value, wp_kses_allowed_html() )
		);
	}

}
