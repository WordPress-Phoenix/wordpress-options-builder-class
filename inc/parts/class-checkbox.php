<?php
/**
 * Checkbox
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_4_1;

/**
 * Class Checkbox
 */
class Checkbox extends Part {

	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = 'on';

	/**
	 * Input type for form field.
	 *
	 * @var string
	 */
	public $input_type = 'checkbox';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Checkbox constructor.
	 *
	 * @param string $i    ID of the field.
	 * @param array  $args Arguments to customize the object instance.
	 */
	public function __construct( $i, $args = [] ) {
		parent::__construct( $i, $args );
		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	/**
	 * Used by extending Toggle_Switch class
	 */
	public function label_markup() {
		return '';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		?>
		<div class="cb-wrap">
			<?php
			$this->input( esc_attr( $this->id ), 'checkbox' );
			$this->label_markup();
			?>
		</div>
		<?php
	}

}
