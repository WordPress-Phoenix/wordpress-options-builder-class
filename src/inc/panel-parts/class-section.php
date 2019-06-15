<?php
/**
 * Section
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Section
 */
class Section {

	/**
	 * ID
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * Classes
	 *
	 * @var array
	 */
	public $classes = [ 'section' ];

	/**
	 * Section Title
	 *
	 * @var string
	 */
	public $label = 'My Custom Section';

	/**
	 * WP Admin Nav Icon
	 *
	 * @var string
	 */
	public $dashicon;

	/**
	 * Parts are typically sections or fields.
	 *
	 * @var array Part Custom object of type part which is a parent class for sections and fields.
	 */
	public $parts = [];

	/**
	 * Reference to the parent object (Panel) where this section lives.
	 *
	 * @var \WPOP\V_5_0\Panel The panel where this section was added.
	 */
	public $panel;

	/**
	 * Section constructor.
	 *
	 * @param string $slug  ID.
	 * @param string $label Printed label.
	 * @param array  $args  Arguments.
	 */
	public function __construct( &$panel, $slug, $label, $args = [] ) {
		$this->panel = $panel;
		$this->slug   = $slug;
		$this->label  = $label;

		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	/**
	 * Print Panel Markup
	 */
	public function echo_html() {
		?>
		<li id="<?php echo esc_attr( $this->slug ); ?>"
			class="<?php echo esc_attr( implode( ' ', $this->classes ) ); ?>">
			<ul>
				<?php
				/**
				 * @var Part $part
				 */
				foreach ( $this->parts as $part ) :
					/**
					 * IDE type hinting for $part variable.
					 *
					 * @var $part Part Field or section.
					 */
					$part_type = strtolower( $part->get_clean_classname() );
					?>
					<li
							class="wpop-option <?php echo esc_attr( $part_type ); ?>"
							data-part="<?php echo esc_attr( $part->id ); ?>"
							data-type="<?php echo esc_attr( $part_type ); ?>"
					>
						<h4 class="label"><?php echo esc_html( $part->label ); ?></h4>

						<?php $part->render(); // Render main unique field output.
						?>

						<?php if ( ! empty( $part->description ) ) : ?>
							<div class="desc clear"><?php echo esc_html( $part->description ); ?></div>
						<?php endif; ?>

						<div class="clear"></div>
					</li>
					<span class="spacer"></span>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php
	}

	/**
	 * Used as the public function to add fields to the section.
	 *
	 * @param $field_type
	 * @param $field_slug
	 * @param $params
	 *
	 * @return Mixed
	 */
	public function add_field( $field_type, $field_slug, $params ) {
		$field_object_name = '\\WPOP\\V_5_0\\Fields\\' . ucwords( strtolower( $field_type ) );
		if ( ! class_exists( $field_object_name ) ) {
			return null;
		}
		$field = new $field_object_name( $this, $field_slug, $params );

		return $this->add_part( $field );
	}

	/**
	 * Used to add parts (sections/fields/markup/etc) to a Panel
	 *
	 * @param Mixed $part object One of the part classes from this file.
	 *
	 * @return Mixed
	 */
	protected function add_part( &$part ) {
		$length = array_push( $this->parts, $part );

		return $this->parts[ $length - 1 ];
	}
}
