<?php
/**
 * Multiselect
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Multiselect
 */
class Multiselect extends Part {

	/**
	 * Value options for select
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
	 * Allow reordering status
	 *
	 * @var bool
	 */
	public $allow_reordering = false;

	/**
	 * Allow creating options status
	 *
	 * @var bool
	 */
	public $create_options = false;

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'multiselect';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Multiselect constructor.
	 *
	 * @param string $i Slug or ID.
	 * @param array  $m Meta values.
	 */
	public function __construct( $i, $m ) {
		parent::__construct( $i, $m );
		$this->values = ( ! empty( $m['values'] ) ) ? $m['values'] : [];
		$this->meta   = ( ! empty( $m ) ) ? $m : [];
	}

	/**
	 * Main render function.
	 */
	public function render() {
		$stored = ! empty( $this->saved ) ? json_decode( $this->saved ) : false;
		?>
		<select title="<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>[]" multiple="multiple" data-multiselect="1">
		<?php
		if ( ! empty( $stored ) && is_array( $stored ) ) :
			foreach ( $stored as $key ) :
				?>
				<option value="<?php echo esc_attr( $key ); ?>" selected="selected">
					<?php
					echo esc_html( $this->values[ $key ] );
					unset( $this->values[ $key ] );
					?>
				</option>
				<?php
			endforeach;
		endif;
		if ( ! empty( $this->values ) && is_array( $this->values ) ) {
			foreach ( $this->values as $key => $value ) {
				?>
				<option value="<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $value ); ?>
				</option>
				<?php
			}
		}
		echo '</select>';
	}

}
