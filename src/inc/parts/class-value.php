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
	 * Include_Partial constructor.
	 *
	 * @param string $i      Slug or ID.
	 * @param array  $config Configuration arguments for customizing object instance.
	 */
	public function __construct( $i, $config ) {
		parent::__construct( $i, [] );
		$this->value = ( ! empty( $config['value'] ) ) ? $config['value'] : '';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		// Guard clause to return early if we don't have a value.
		if ( empty( $this->value ) ) {
			return;
		}

		echo sprintf(
			'<li class="%1$s">%2$s</li>',
			esc_attr( $this->get_clean_classname() ),
			wp_kses( $this->string, wp_kses_allowed_html() )
		);
	}

}
