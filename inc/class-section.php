<?php

namespace WPOP\V_4_0;

class Section {

	/**
	 * @var
	 */
	public $id;

	/**
	 * @var array
	 */
	public $classes = array( 'section' );

	/**
	 * @var string
	 */
	public $label = 'My Custom Section';

	/**
	 * @var
	 */
	public $dashicon;

	/**
	 * @var
	 */
	protected $parts;

	/**
	 * Section constructor.
	 *
	 * @param string $id
	 * @param array  $args
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
				<?php foreach ( $this->parts as $part ) {
					$class_str = strtolower( $part->get_clean_classname() );
					?>
					<li class="wpop-option <?php echo esc_attr( $class_str ); ?>"
						data-part="<?php echo esc_attr( $part->id ); ?>">
						<h4 class="label">
							<?php echo esc_html( $part->label ); ?>
						</h4>
						<?php
						// render main unique field output
						$part->render();
						if ( ! empty( $part->description ) ) { ?>
							<div class="desc clear"><?php echo esc_html( $part->description ); ?></div>
						<?php } ?>
						<div class="clear"></div>
					</li><span class="spacer"></span>
				<?php
				}
				?>
			</ul>
		</li>
		<?php
	}
}
