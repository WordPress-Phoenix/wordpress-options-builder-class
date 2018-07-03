<?php
/**
 * Select (drop down)
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_4_1;

/**
 * Class Select
 */
class Select extends Part {
	/**
	 * Possible values
	 *
	 * @var array
	 */
	public $values;

	/**
	 * Meta
	 *
	 * @var array
	 */
	public $meta;

	/**
	 * Empty value
	 *
	 * @var bool Default for empty $_POST value.
	 */
	public $empty_default = true;

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'select';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Select constructor.
	 *
	 * @param string $i Slug or ID.
	 * @param array  $m Array of possible values.
	 */
	public function __construct( $i, $m ) {
		parent::__construct( $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	/**
	 * Main render function
	 */
	public function render() {
		$default_option = isset( $this->meta['option_default'] ) ? $this->meta['option_default'] : 'Select an option'; ?>
		<select title="<?php echo esc_attr( $this->id ); ?>"
				id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
				data-select="true" data-placeholder="<?php echo esc_attr( $default_option ); ?>">
			<?php if ( $this->empty_default ) : ?>
				<option value=""></option>
			<?php endif; ?>
			<?php
			foreach ( $this->values as $value => $label ) :
				?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $this->get_saved() ); ?>>
					<?php echo esc_html( $label ); ?>
				</option>
				<?php
			endforeach;
			?>
		</select>
		<?php
	}

}
