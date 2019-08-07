<?php
/**
 * Radio Buttons
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

/**
 * Class Radio_Buttons
 */
class Radio_Buttons extends Part {

	/**
	 * Value options for radio buttons
	 *
	 * @var array
	 */
	public $values;

	/**
	 * Default selected value
	 *
	 * @var string
	 */
	public $default_value = '';

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'radio_buttons';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Radio_Buttons constructor.
	 *
	 * @param \WPOP\V_5_0\Section $section Reference to the parent object (Panel) where this section lives.
	 * @param string              $i       Slug or ID.
	 * @param array               $c       Array of value options.
	 */
	public function __construct( &$section, $i, $c ) {
		parent::__construct( $section, $i, $c );
		$this->values = ( ! empty( $c['values'] ) ) ? $c['values'] : [];
	}

	/**
	 * Main render function
	 */
	public function render() {
		foreach ( $this->values as $key => $value ) {
			$selected_val = $this->get_saved() ? $this->get_saved() : $this->default_value;
			?>
			<div class="radio-wrap">
				<table class="widefat striped">
					<tr>
						<td>
							<label class="opt-label" for="<?php echo esc_attr( $this->id . '_' . $key ); ?>">
								<?php echo esc_html( $value ); ?>
							</label>
						</td>
						<td>
							<input
									type="radio"
									id="<?php echo esc_attr( $this->id . '_' . $key ); ?>"
									name="<?php echo esc_attr( $this->field_id ); ?>"
									value="<?php echo esc_attr( $value ); ?>"
									class="radio-item"
								<?php checked( $value, $selected_val ); ?>
							/>
						</td>
					</tr>
				</table>
			</div>
			<?php
		}
	}

}
