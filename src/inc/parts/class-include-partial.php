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
		$this->filename = ( ! empty( $config['filename'] ) ) ? $config['filename'] : 'set_the_filename.php';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		if ( ! empty( $this->filename ) && is_file( $this->filename ) ) { ?>
			<li class="<?php echo esc_attr( $this->get_clean_classname() ); ?>">
				<?php
				if ( function_exists( 'wpcom_vip_file_get_contents' ) ) {
					$contents = wpcom_vip_file_get_contents( $this->filename );
				} else {
					/**
					 * We need to ignore this file_get_contents call, because it's
					 * required outside of a WordPress VIP environment (where the
					 * safer `wpcom_vip_file_get_contents()` is available).
					 *
					 * In a VIP environment, this will never be called.
					 */

					// phpcs:disable
					$contents = file_get_contents( $this->filename );
					// phpcs:enable
				}

				echo wp_kses( $contents, wp_kses_allowed_html() );
				?>
			</li>
			<?php
		}
	}

}
