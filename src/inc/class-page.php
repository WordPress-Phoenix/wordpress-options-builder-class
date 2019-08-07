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
class Page {

	/**
	 * Slug represent the ID for the page
	 *
	 * @var string if it has a parent page, represents the slug or ID.
	 */
	public $slug = 'main_menu_slug';

	/**
	 * Page menu type - main_menu or sub_menu
	 *
	 * @var string if it has a parent page, represents the slug or ID.
	 */
	public $type = 'main_menu';


	/**
	 * Settings API determines database storage location
	 * Intended to separate network settings, site settings and user settings into proper tables.
	 *
	 * @var string with value of API to use
	 */
	public $api = 'site';

	/**
	 * Parent Page ID
	 *
	 * @var string if it has a parent page, represents the slug or ID.
	 */
	public $parent_menu_id = null;

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
	 * WP Admin Primary Nav Title
	 *
	 * @var string
	 */
	public $capability = 'manage_options';

	/**
	 * Field Parts
	 *
	 * @var array Array holds list of all parts (usually HTML fields).
	 */
	public $parts = [];

	/**
	 * Notifications
	 *
	 * @var array - string notifications to print at top of panel
	 */
	public $notifications = [];

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
	public $installed_dir_uri = null;

	/**
	 * Update Counts
	 *
	 * @var array used to track what happens during save process
	 */
	public $updated_counts = [
		'created' => 0,
		'updated' => 0,
		'deleted' => 0,
	];

	/**
	 * Page constructor.
	 *
	 * @param string      $options_page_slug The slug represents the ID of the page.
	 * @param string      $options_page_type The type can be either main_menu or sub_menu.
	 * @param string|null $parent_menu_id    The parent id only set if this is a sub_menu.
	 * @param string      $installed_dir     A field value of menu slug.
	 * @param string      $installed_dir_uri A value of either main_menu or sub_menu.
	 */
	public function __construct( $options_page_slug, $options_page_type, $parent_menu_id, $installed_dir, $installed_dir_uri ) {
		$this->slug              = $options_page_slug;
		$this->type              = $options_page_type;
		$this->parent_menu_id    = $parent_menu_id;
		$this->installed_dir     = $installed_dir;
		$this->installed_dir_uri = $installed_dir_uri;
	}

	/**
	 * Executes page registration with WordPress Admin Menu API
	 *
	 * @return void
	 */
	public function initialize() {
		if ( empty( $this->api ) || ! is_string( $this->api ) ) {
			return;
		}

		$hook = ( 'network' === $this->api || 'user-network' === $this->api ) ? 'network_admin_menu' : 'admin_menu';

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_dependencies' ] );

		add_action( $hook, [ $this, 'callback_add_custom_page' ] );
		add_action( 'current_screen', [ $this, 'maybe_run_footer_scripts' ] );
	}

	/**
	 * Register Submenu Page with WordPress
	 * Do not call directly, requires the scope of running during a WordPress action like admin_menu
	 *
	 * @return void
	 */
	public function callback_add_custom_page() {
		if ( 'sub_menu' === $this->type && ! empty( $this->parent_menu_id ) ) {
			add_submenu_page(
				$this->parent_menu_id,
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->slug,
				[ $this, 'build_parts' ]
			);
		} else {
			add_menu_page(
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->slug,
				[ $this, 'build_parts' ],
				$this->dashicon,
				$this->position
			);
		}
	}

	/**
	 * Build Parts - output parts to DOM
	 *
	 * @return void
	 */
	public function build_parts() {
		if ( 'open' === $this->api ) {
			do_action( 'wpop_' . $this->slug . '_open_page_content' );

			return;
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
				<form method="post" class="pure-form wpop-form" autocomplete="off">
					<?php
					/**
					 * Print WordPress Notices with Panel Information
					 */
					if ( ! empty( filter_input( INPUT_GET, 'submit' ) ) ) {
						$this->echo_notifications();
					}

					$this->page_header();
					do_action( 'wpop_' . $this->slug . '_page_content' );
					$this->page_footer();
					wp_nonce_field( $this->slug );
					?>
				</form>
			</section>
		</div> <!-- end #wpopOptions -->
		<?php
	}

	/**
	 * Load footer scripts on relevant pages.
	 *
	 * @param \WP_Screen $screen WordPress screen slug or ID.
	 *
	 * @return void
	 */
	public function maybe_run_footer_scripts( $screen ) {
		$flag1 = stristr( $screen->id, $this->slug );
		$flag2 = $this->installed_dir_uri;
		if ( false === stristr( $screen->id, $this->slug ) || null === $this->installed_dir_uri ) {
			return;
		}

		$asset_class_path = __NAMESPACE__ . '\\Assets';

		// Instantiate the Asset class with the installed directory as a parameter.
		$asset_class = new $asset_class_path( $this->installed_dir_uri );

		add_action(
			'admin_print_footer_scripts-' . $screen->id,
			[ $asset_class, 'inline_js_footer' ]
		);

		add_action(
			'admin_enqueue_scripts',
			[ $asset_class, 'register_js' ]
		);

		add_action(
			'admin_enqueue_scripts',
			[ $asset_class, 'register_css' ]
		);
	}

	/**
	 * Builds <header>
	 *
	 * @return void
	 */
	public function page_header() {
		?>
		<header class="wpop-head">
			<div class="inner">
				<h1>
					<?php if ( ! empty( $this->dashicon ) ) : ?>
						<span class="dashicons <?php echo esc_attr( $this->dashicon ); ?> page-icon"></span>
					<?php endif; ?>
					<?php echo esc_attr( $this->page_title ); ?>
				</h1>
				<input type="submit" class="button button-primary button-hero save-all" value="Save All" name="submit"/>
			</div>
		</header>
		<?php
	}


	/**
	 * <footer> for panel page
	 *
	 * @return void
	 */
	public function page_footer() {
		?>
		<footer class="pure-u-1">
			<div class="pure-g">
				<div class="pure-u-1 pure-u-md-1-3">
					<div>
						<?php
						do_action( 'wpop_page_footer' );
						?>
						<ul>
							<li>Stored in: <code><?php echo esc_attr( $this->get_storage_table() ); ?></code></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
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
	 *
	 * @return void
	 */
	public function enqueue_dependencies() {
		// Enqueue media needed for media modal.
		wp_enqueue_media();
		wp_enqueue_script( 'iris' );
		wp_enqueue_script( 'wp-util' );
		wp_enqueue_script( 'wp-shortcode' );
	}

	/**
	 * Print WordPress Admin Notifications
	 *
	 * @example $note_data = array( 'notification' => 'My text', 'type' => 'notice-success' )
	 */
	public function echo_notifications() {
		foreach ( $this->notifications as $note_data ) {
			$this->single_notification( $note_data );
		}
	}

	/**
	 * Create single notification markup
	 *
	 * @param string $notification The text to display in the notification.
	 */
	public function single_notification( $notification ) {
		$data      = is_array( $notification ) ? $notification : [ 'notification' => $notification ];
		$note_type = isset( $data['type'] ) ? $data['type'] : 'notice-success';
		?>
		<div class="notice <?php echo esc_attr( $note_type ); ?>">
			<p><strong><?php echo esc_html( $data['notification'] ); ?></p>
		</div>
		<?php
	}

	/**
	 * Used as the public function to add fields to the section.
	 *
	 * @param string $page_slug Page slug field.
	 * @param array  $params    Panels params array.
	 *
	 * @return Mixed
	 */
	public function add_panel( $page_slug, $params = [] ) {
		$panel = new Panel( $this, $page_slug, $params );

		return $this->add_part( $panel );
	}

	/**
	 * Used to add parts (sections/fields/markup/etc) to a Panel
	 *
	 * @param \WPOP\V_5_0\Panel $panel object One of the part classes from this file.
	 *
	 * @return \WPOP\V_5_0\Panel
	 */
	public function add_part( &$panel ) {
		$length = array_push( $this->parts, $panel );

		return $this->parts[ $length - 1 ];
	}
}
