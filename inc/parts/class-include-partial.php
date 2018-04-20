<?php

namespace WPOP\V_4_0;

/**
 * Class Include_Partial
 * @package WPOP\V_3_0
 */
class Include_Partial extends Part {

	public $filename;
	public $input_type = 'include_partial';

	public function __construct( $i, $config ) {
		parent::__construct( $i, [] );
		$this->filename = ( ! empty( $config['filename'] ) ) ? $config['filename'] : 'set_the_filename.php';
	}

	public function render() {
		if ( ! empty( $this->filename ) && is_file( $this->filename ) ) { ?>
			<li class="<?php esc_attr_e( $this->get_clean_classname() ); ?>">
				<?php echo file_get_contents( $this->filename ); ?>
			</li>
			<?php
		}
	}
}
