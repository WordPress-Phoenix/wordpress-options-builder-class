<?php

namespace WPOP\V_4_1;

class Page extends Panel {

	/**
	 * @var string
	 */
	public $parent_page_id = '';

	/**
	 * @var string
	 */
	public $page_title = 'Custom Site Options';

	/**
	 * @var string
	 */
	public $menu_title = 'Custom Site Options';

	/**
	 * @var
	 */
	public $dashicon;

	/**
	 * @var bool
	 */
	public $disable_styles = false;


	public $initialized = false;

	/**
	 * Page constructor.
	 *
	 * @param array $args
	 * @param array $fields
	 */
	public function __construct( $args = [], $fields ) {
		parent::__construct( $args, $fields );
	}

	/**
	 * !!! USE ME TO RUN THE PANEL !!!
	 *
	 * Main method called by extending class to initialize the panel
	 */
	public function initialize_panel() {
		if ( ! empty( $this->api ) && is_string( $this->api ) ) {
			$dashboard = 'admin_menu';
			if ( 'network' === $this->api || 'user-network' === $this->api ) {
				$dashboard = 'network_admin_menu';
			}
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_dependencies' ) );
			add_action( $dashboard, array( $this, 'add_settings_submenu_page' ) );
			add_action( 'current_screen', array( $this, 'maybe_run_footer_scripts' ) );
		}
	}

	/**
	 * Register Submenu Page with WordPress to display the panel on
	 */
	public function add_settings_submenu_page() {
		add_submenu_page(
			$this->parent_page_id, // file.php to hook into
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->id,
			array( $this, 'build_parts' )
		);
	}

	function maybe_run_footer_scripts( $screen ) {
		if ( false !== stristr( $screen->id, $this->id ) ) {
			add_action( 'admin_print_footer_scripts-' . $screen->id, array(
				__NAMESPACE__ . '\\Assets',
				'inline_js_footer',
			) );
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
					<?php if ( ! empty( $this->dashicon ) ) { ?>
						<span class="dashicons <?php echo esc_attr( $this->dashicon ); ?> page-icon"></span>
						<?php
					}
					echo esc_attr( $this->page_title ); ?>
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
							<?php if ( ! empty( $section['dashicon'] ) ) { ?>
								<span
									class="dashicons <?php echo sanitize_html_class( $section['dashicon'] ); ?> menu-icon"></span>
								<?php
							}
							echo esc_html( $section['label'] );
							if ( count( $section['parts'] ) > 1 ) { ?>
								<small class="part-count">
									<?php echo esc_attr( count( $section['parts'] ) ); ?>
								</small>
							<?php } ?>
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
	 *
	 */
	public function build_parts() {
		if ( 'site' !== $this->api && 'network' !== $this->api && ! is_object( $this->panel_object ) ) {
			echo '<h1>Please select a ' . esc_attr( $this->api ) . '.</h1>';
			echo '<code>?' . esc_attr( $this->api ) . '=ID</code>';
			exit;
		}
		?>
		<div id="wpopOptions">
			<?php
			if ( ! $this->disable_styles ) {
				Assets::inline_css();
				Assets::inline_js_header();
			}
			?>
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
					echo wp_nonce_field( esc_attr( $this->id, '_wpnonce' ), true, false );
					?>
				</form>
			</section>
		</div> <!-- end #wpopOptions -->
		<?php
	}

	/**
	 * @return string
	 */
	public function get_storage_table() {
		global $wpdb;
		switch ( $this->api ) {
			case 'post':
				return $wpdb->prefix . 'postmeta';
				break;
			case 'term':
				return $wpdb->prefix . 'termmeta';
				break;
			case 'user':
				return is_multisite() ? $wpdb->base_prefix . 'usermeta' : $wpdb->prefix . 'usermeta';
				break;
			case 'network':
				return $wpdb->prefix . 'sitemeta';
				break;
			case 'site':
			default:
				return $wpdb->prefix . 'options';
				break;
		}
	}

	/**
	 *
	 */
	public function enqueue_dependencies() {
		$unpkg = 'https://unpkg.com/purecss@1.0.0/build/';
		wp_register_style( 'wpop-pure-base', $unpkg . 'base-min.css' );
		wp_register_style( 'wpop-pure-grids', $unpkg . 'grids-min.css', array( 'wpop-pure-base' ) );
		wp_register_style( 'wpop-pure-grids-r', $unpkg . 'grids-responsive-min.css', array( 'wpop-pure-grids' ) );
		wp_register_style( 'wpop-pure-menus', $unpkg . 'menus-min.css', array( 'wpop-pure-grids-r' ) );
		wp_register_style( 'wpop-pure-forms', $unpkg . 'forms-min.css', array( 'wpop-pure-menus' ) );
		wp_enqueue_style( 'wpop-pure-forms' ); // cue enqueue cascade

		// Enqueue media (needed for media modal)
		wp_enqueue_media();

		wp_enqueue_script( array( 'iris', 'wp-util', 'wp-shortcode' ) );

		$selectize_cdn = 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/';
		wp_register_script( 'wpop-selectize', $selectize_cdn . 'js/standalone/selectize.min.js', array( 'jquery-ui-sortable' ) );
		wp_enqueue_script( 'wpop-selectize' );
		wp_register_style( 'wpop-selectize', $selectize_cdn . 'css/selectize.default.min.css' );
		wp_enqueue_style( 'wpop-selectize' );
		wp_register_script( 'clipboard', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js' );
		wp_enqueue_script( 'clipboard' );
	}
}
