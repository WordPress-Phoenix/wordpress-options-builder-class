<?php
/**
 * Include Partial
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
class Include_Partial extends Part {
	/**
	 * File name
	 *
	 * @var string
	 */
	public $filename;

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'include_partial';

	/**
	 * Include_Partial constructor.
	 *
	 * @param string $i      Slug or ID.
	 * @param array  $config Configuration arguments for customizing object instance.
	 */
	public function __construct( $i, $config ) {
		parent::__construct( $i, [] );

		$this->filename = ! empty( $config['filename'] ) ? $config['filename'] : '';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		if ( empty( $this->filename ) || ! is_file( $this->filename ) ) {
			return;
		}

		?>
		<li class="<?php echo esc_attr( $this->get_clean_classname() ); ?>">
			<?php include $this->filename; ?>
		</li>
		<?php
	}

}
