<?php
/**
 * Include Partial
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Part;

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
	public $filepath;

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'include_partial';

	/**
	 * Include_Partial constructor.
	 *
	 * @param \WPOP\V_5_0\Section $section
	 * @param string              $i      Slug or ID.
	 * @param array               $config Configuration arguments for customizing object instance.
	 */
	public function __construct( &$section, $i, $config ) {
		parent::__construct( $section, $i, $config );

		$this->filepath = ! empty( $config['filepath'] ) ? $config['filepath'] : '';
	}

	/**
	 * Main render function.
	 */
	public function render() {
		if ( empty( $this->filepath ) || ! is_file( $this->filepath ) ) {
			return;
		}

		?>
		<li class="<?php echo esc_attr( $this->get_clean_classname() ); ?>">
			<?php include $this->filepath; ?>
		</li>
		<?php
	}

}
