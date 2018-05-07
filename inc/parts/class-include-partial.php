<?php

namespace WPOP\V_4_1;

/**
 * Class Include_Partial
 *
 * @package WPOP\V_3_0
 */
class Include_Partial extends Part {
	/**
	 * @var string
	 */
	public $filename;
	/**
	 * @var string
	 */
	public $input_type = 'include_partial';

	/**
	 * Include_Partial constructor.
	 *
	 * @param $i
	 * @param $config
	 */
	public function __construct( $i, $config ) {
		parent::__construct( $i, [] );
		$this->filename = ( ! empty( $config['filename'] ) ) ? $config['filename'] : 'set_the_filename.php';
	}

	/**
	 *
	 */
	public function render() {
		if ( ! empty( $this->filename ) && is_file( $this->filename ) ) { ?>
			<li class="<?php echo esc_attr( $this->get_clean_classname() ); ?>">
				<?php echo esc_html( static::wpvip_safe_get_contents( $this->filename ) ); ?>
			</li>
			<?php
		}
	}

	/**
	 * Try VIP function for get contents.
	 */
	public static function wpvip_safe_get_contents( $filename ) {
		if ( function_exists( 'wpcom_vip_file_get_contents' ) ) {
			return wpcom_vip_file_get_contents( $filename );
		} else {
			return file_get_contents( $filename );
		}
	}
}
