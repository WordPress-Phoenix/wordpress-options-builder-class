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
	public $id;

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
	 * @var Part Custom object of type part which is a parent class for sections and fields.
	 */
	protected $parts;

	/**
	 * Section constructor.
	 *
	 * @param string $id   ID.
	 * @param array  $args Arguments.
	 */
	public function __construct( $id, $args = [] ) {
		$this->id = $id;

		foreach ( $args as $name => $value ) {
			$this->$name = $value;
		}
	}

	/**
	 * Print Panel Markup
	 */
	public function echo_html() {
		?>
		<li id="<?php echo esc_attr( $this->id ); ?>"
			class="<?php echo esc_attr( implode( ' ', $this->classes ) ); ?>">
			<ul>
				<?php
				/**
				 * Typehinting $part
				 *
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

						<?php $part->render(); // Render main unique field output. ?>

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
}
