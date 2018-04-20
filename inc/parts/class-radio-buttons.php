<?php

namespace WPOP\V_4_0;

/**
 * Class Radio_Buttons
 * @package WPOP\V_3_0
 */
class Radio_Buttons extends Part {

	public $values;
	public $default_value = '';
	public $input_type = 'radio_buttons';
	public $data_store = true;

	/**
	 * Radio_Buttons constructor.
	 *
	 * @param $i
	 * @param $c
	 */
	public function __construct( $i, $c ) {
		parent::__construct( $i, $c );
		$this->values = ( ! empty( $c['values'] ) ) ? $c['values'] : [];
	}

	/**
	 *
	 */
	public function render() {
		foreach ( $this->values as $key => $value ) {
			$selected_val = $this->get_saved() ? $this->get_saved() : $this->default_value;
			?>
			<div class="radio-wrap">
				<table class="widefat striped">
					<tr>
						<td>
							<label class="opt-label" for="<?php esc_attr_e( $this->id . '_' . $key ); ?>">
								<?php esc_html_e( $value ); ?>
							</label>
						</td>
						<td>
							<input type="radio" id="<?php esc_attr_e( $this->id . '_' . $key ); ?>"
							       name="<?php esc_attr_e( $this->field_id ); ?>" value="<?php esc_attr_e( $value ); ?>"
							       class="radio-item" <?php checked( $value, $selected_val ); ?> />
						</td>
					</tr>
				</table>
			</div>
			<?php
		}
	}
}