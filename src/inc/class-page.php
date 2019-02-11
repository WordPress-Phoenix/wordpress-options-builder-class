<?php
/**
 * Page
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Page
 */
class Page extends Panel {

	/**
	 * Parent Page ID
	 *
	 * @var string if it has a parent page, represents the slug or ID.
	 */
	public $parent_page_id = '';

	/**
	 * Page Title
	 *
	 * @var string
	 */
	public $page_title = 'Custom Site Options';

	/**
	 * WP Admin Primary Nav Title
	 *
	 * @var string
	 */
	public $menu_title = 'Custom Site Options';

	/**
	 * WP Admin Primary Nav Icon
	 *
	 * @var string
	 */
	public $dashicon;

	/**
	 * Disable default styles option
	 *
	 * @var bool Set to true to disable rending of default CSS.
	 */
	public $disable_styles = false;

	/**
	 * Initialized state variable
	 *
	 * @var bool Represents the current state of the object.
	 */
	public $initialized = false;

	/**
	 * Installed Directory (on server)
	 *
	 * @var string
	 */
	public $installed_dir;

	/**
	 * Installed Directory URI
	 *
	 * @var string
	 */
	public $installed_dir_uri;

	/**
	 * Page constructor.
	 *
	 * @param array $args   Arguments used to customize the object.
	 * @param array $fields Fields Fields created on the page, outside of sections.
	 */
	public function __construct( $args = [], $fields ) { // @codingStandardsIgnoreLine
		parent::__construct( $args, $fields );

		if ( isset( $args['installed_dir'] ) ) {
			$this->installed_dir = $args['installed_dir'] . 'lib/wordpress-phoenix/wordpress-options-builder-class/src';
		}

		if ( isset( $args['installed_dir_uri'] ) ) {
			$this->installed_dir_uri = $args['installed_dir_uri'] . 'lib/wordpress-phoenix/wordpress-options-builder-class/src';
		}
	}

	/**
	 * !!! USE ME TO RUN THE PANEL !!!
	 *
	 * Main method called by extending class to initialize the panel
	 */
	public function initialize_panel() {
		if ( ! empty( $this->api ) && is_string( $this->api ) ) {
			$hook = ( 'network' === $this->api || 'user-network' === $this->api ) ? 'network_admin_menu' : 'admin_menu';

			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_dependencies' ] );
			add_action( $hook, [ $this, 'add_settings_submenu_page' ] );
			add_action( 'current_screen', [ $this, 'maybe_run_footer_scripts' ] );
		}
	}

	/**
	 * Register Submenu Page with WordPress to display the panel on
	 */
	public function add_settings_submenu_page() {
		add_submenu_page(
			$this->parent_page_id,
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->id,
			[ $this, 'build_parts' ]
		);
	}

	/**
	 * Load footer scripts on relevant pages.
	 *
	 * @param \WP_Screen $screen WordPress screen slug or ID.
	 */
	public function maybe_run_footer_scripts( $screen ) {
		if ( false !== stristr( $screen->id, $this->id ) ) {
			$asset_class_path = __NAMESPACE__ . '\\Assets';

			// Instantiate the Asset class with the installed directory as a parameter.
			$asset_class = new $asset_class_path( $this->installed_dir_uri );

			add_action(
				'admin_print_footer_scripts-' . $screen->id,
				[
					$asset_class,
					'inline_js_footer',
				]
			);

			add_action(
				'admin_enqueue_scripts',
				[
					$asset_class,
					'register_js',
				]
			);

			add_action(
				'admin_enqueue_scripts',
				[
					$asset_class,
					'register_css',
				]
			);
		}
	}

	/**
	 * Builds <header>
	 */
	public function page_header() {
		?>
		<header class="wpop-head">
			<div class="inner">
				<h1>
					<?php if ( ! empty( $this->dashicon ) ) : ?>
						<span class="dashicons <?php echo esc_attr( $this->dashicon ); ?> page-icon"></span>
						<?php
					endif;
					echo esc_attr( $this->page_title );
					?>
				</h1>
				<input type="submit" class="button button-primary button-hero save-all" value="Save All" name="submit"/>
			</div>
		</header>
		<?php
	}

	/**
	 * Build container holding left sidebar and main content area
	 */
	public function page_content() {
		?>
		<div id="wpopContent" class="pure-g">
			<div id="wpopNav" class="pure-u-1 pure-u-md-6-24">
				<?php $this->page_content_sidebar(); ?>
			</div>
			<div id="wpopMain" class="pure-u-1 pure-u-md-18-24">
				<?php $this->page_content_main(); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Left-sidebar in page_content()
	 */
	public function page_content_sidebar() {
		?>
		<div class="pure-menu wpop-options-menu">
			<ul class="pure-menu-list">
				<?php
				foreach ( $this->parts as $section_id => $section ) {
					?>
					<li id="<?php echo esc_attr( $section_id . '-nav' ); ?>" class="pure-menu-item">
						<a href="<?php echo esc_attr( '#' . $section_id ); ?>" class="pure-menu-link">
							<?php if ( ! empty( $section['dashicon'] ) ) : ?>
								<span class="dashicons <?php echo sanitize_html_class( $section['dashicon'] ); ?> menu-icon"></span>
								<?php
							endif;
							echo esc_html( $section['label'] );
							?>
							<?php if ( count( $section['parts'] ) > 1 ) : ?>
								<small class="part-count">
									<?php echo esc_attr( count( $section['parts'] ) ); ?>
								</small>
							<?php endif; ?>
						</a>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Main area in page_content()
	 */
	public function page_content_main() {
		?>
		<ul id="wpopOptNavUl" style="list-style: none;">
			<?php
			foreach ( $this->parts as $section_key => $section ) {
				$built_section = new Section( $section_key, $section );
				$built_section->echo_html();
			}
			?>
		</ul>
		<?php
	}

	/**
	 * <footer> for panel page
	 */
	public function page_footer() {
		?>
		<footer class="pure-u-1">
			<div class="pure-g">
				<div class="pure-u-1 pure-u-md-1-3">
					<div>
						<ul>
							<li>Sections: <code><?php echo esc_attr( $this->section_count ); ?></code></li>
							<li>Total Data Parts: <code><?php echo esc_attr( $this->data_count ); ?></code></li>
							<li>Total Parts: <code><?php echo esc_attr( $this->part_count ); ?></code></li>
							<li>Stored in: <code><?php echo esc_attr( $this->get_storage_table() ); ?></code></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}


	/**
	 * Build Parts - output parts to DOM
	 */
	public function build_parts() {
		if ( 'site' !== $this->api && 'network' !== $this->api && ! is_object( $this->panel_object ) ) {
			echo '<h1>Please select a ' . esc_attr( $this->api ) . '.</h1>';
			echo '<code>?' . esc_attr( $this->api ) . '=ID</code>';
			exit;
		}
		?>
		<div id="wpopOptions">
			<!-- IMPORTANT: allows core admin notices -->
			<section class="wrap wp">
				<header><h2></h2></header>
			</section>
			<section id="wpop" class="wrap">
				<div id="panel-loader-positioning-wrap">
					<div id="panel-loader-box">
						<div class="wpcore-spin panel-spinner"></div>
					</div>
				</div>
				<form method="post" class="pure-form wpop-form">
					<?php
					/**
					 * Print WordPress Notices with Panel Information
					 */
					if ( ! empty( filter_input( INPUT_GET, 'submit' ) ) ) {
						$this->echo_notifications();
					}
					/**
					 * Build <header>
					 */
					$this->page_header();
					/**
					 * Build <div id="wpopContent"> Container Holding Sidebar + Sections
					 */
					$this->page_content();
					/**
					 * Build <footer>
					 */
					$this->page_footer();
					/**
					 * Print Nonce Field
					 */
					wp_nonce_field( $this->id );
					?>
				</form>
			</section>
		</div> <!-- end #wpopOptions -->
		<?php
	}

	/**
	 * Dynamic get data function, based on current objects param->api value.
	 *
	 * @return string
	 */
	public function get_storage_table() {
		global $wpdb;
		switch ( $this->api ) {
			case 'post':
				return $wpdb->prefix . 'postmeta';
			case 'term':
				return $wpdb->prefix . 'termmeta';
			case 'user':
				return is_multisite() ? $wpdb->base_prefix . 'usermeta' : $wpdb->prefix . 'usermeta';
			case 'network':
				return $wpdb->prefix . 'sitemeta';
			case 'site':
			default:
				return $wpdb->prefix . 'options';
		}
	}

	/**
	 * Enqueue dependencies
	 */
	public function enqueue_dependencies() {
		// Enqueue media needed for media modal.
		wp_enqueue_media();
		wp_enqueue_script( 'iris' );
		wp_enqueue_script( 'wp-util' );
		wp_enqueue_script( 'wp-shortcode' );
	}
}
