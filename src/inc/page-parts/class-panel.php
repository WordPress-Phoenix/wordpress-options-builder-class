<?php
/**
 * Panel - is actually the options controller. Typically used as an extension of the Page class.
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Panel
 */
class Panel {

	/**
	 * API Setting
	 *
	 * @var null|string Used by class to determine WordPress data api
	 */
	public $api;

	/**
	 * Panel ID
	 *
	 * @var null|string slug or title of a panel
	 */
	public $slug;

	/**
	 * Required Capabilities
	 *
	 * @var string Matches WordPress capabilities required to access this set of options.
	 */
	public $capability = 'manage_options';

	/**
	 * Sections
	 *
	 * @var array Array holds list of all parts (usually HTML fields).
	 */
	public $parts = [];

	/**
	 * WordPress Object ID
	 *
	 * @var null|void - preset with WP Core Object ID from query param
	 * @see $this->maybe_capture_wp_object_id();
	 */
	public $obj_id = null;

	/**
	 * Page Title
	 *
	 * @var string Title for Page object type
	 */
	public $page_title;

	/**
	 * Panel Object Instance
	 *
	 * @var Panel
	 */
	public $panel_object;

	/**
	 * Part Count
	 *
	 * @var int Sum of parts included in this Page of options.
	 */
	public $part_count = 0;

	/**
	 * Section Count
	 *
	 * @var int Sum of parts included in this Section of options.
	 */
	public $section_count = 0;

	/**
	 * Data Counts
	 *
	 * @var int Sum of all data found?
	 */
	public $data_count = 0;

	/**
	 * Page object (parent)
	 *
	 * @var \WPOP\V_5_0\Page Represent the custom menu page object.
	 */
	public $page;

	/**
	 * Panel ID
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Container constructor.
	 *
	 * @param object $page                    Referenced page object.
	 * @param string $slug                    Page URL.
	 * @param array  $default_param_overrides Arguments used to customize instance of this class.
	 */
	public function __construct( &$page, $slug, $default_param_overrides = [] ) {
		$this->page = $page;
		$this->slug = $slug;
		add_action( 'wpop_page_footer', [ $this, 'callback_footer_html' ] );
		add_action( 'wpop_' . $this->page->slug . '_page_content', [ $this, 'callback_content_html' ] );

		// Establish panel id.
		$this->id = preg_replace( '/_/', '-', $this->slug );

		// Magic-set class object vars from array.
		foreach ( $default_param_overrides as $key => $val ) {
			$this->$key = $val;
		}

		// Establish data storage api.
		$this->api = $this->detect_data_api_and_permissions();

		// Maybe establish WordPress object id when api is one of the metadata APIs.
		$this->obj_id = $this->maybe_capture_wp_object_id();
	}

	/**
	 * Print function to iterate through parts.
	 */
	public function callback_content_html() {
		?>
		<div id="wpopContent" class="pure-g">
			<div id="wpopNav" class="pure-u-1 pure-u-md-6-24">
				<?php $this->content_sidebar(); ?>
			</div>
			<div id="wpopMain" class="pure-u-1 pure-u-md-18-24">
				<?php $this->content_main(); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Left-sidebar in callback_content_html()
	 *
	 * @return void
	 */
	public function content_sidebar() {
		?>
		<div class="pure-menu wpop-options-menu">
			<ul class="pure-menu-list">
				<?php
				/**
				 * Iterating through section parts.
				 *
				 * @var \WPOP\V_5_0\Section $section
				 */
				foreach ( $this->parts as $key => $section ) :
					?>
					<li id="<?php echo esc_attr( $section->slug . '-nav' ); ?>" class="pure-menu-item">
						<a href="<?php echo esc_attr( '#' . $section->slug ); ?>" class="pure-menu-link">
							<?php if ( ! empty( $section->dashicon ) ) : ?>
								<span class="dashicons <?php echo sanitize_html_class( $section->dashicon ); ?> menu-icon"></span>
							<?php endif; ?>

							<?php echo esc_html( $section->label ); ?>

							<?php if ( count( $section->parts ) > 1 ) : ?>
								<small class="part-count">
									<?php echo esc_attr( count( $section->parts ) ); ?>
								</small>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Main area in callback_content_html()
	 *
	 * @return void
	 */
	public function content_main() {
		?>
		<ul id="wpopOptNavUl" style="list-style: none;">
			<?php
			foreach ( $this->parts as $section_key => $section ) {
				$section->echo_html();
			}
			?>
		</ul>
		<?php
	}

	/**
	 * Default string representing Class object
	 *
	 * @return null|string
	 */
	public function __toString() {
		return $this->slug;
	}

	/**
	 * Listen for query parameters denoting Post, User or Term object IDs for metadata api or network/site option apis
	 *
	 * @return string
	 */
	public function detect_data_api_and_permissions() {
		$api = null;

		$page = array_key_exists( 'page', $_GET ) ? filter_input( INPUT_GET, 'page' ) : null;
		$post = array_key_exists( 'post', $_GET ) ? filter_input( INPUT_GET, 'post' ) : null;
		$user = array_key_exists( 'user', $_GET ) ? filter_input( INPUT_GET, 'user' ) : null;
		$term = array_key_exists( 'term', $_GET ) ? filter_input( INPUT_GET, 'term' ) : null;

		if ( ! empty( $page ) ) {
			if ( isset( $post ) && absint( $post ) ) {
				$api      = 'post';
				$post_obj = get_post( absint( $post ) );
				if ( is_object( $post_obj ) && ! is_wp_error( $post_obj ) && isset( $post_obj->post_title ) ) {
					$this->panel_object = $post_obj;
					$this->page_title   = esc_attr( $this->page_title ) . ' for ' . esc_attr( $post_obj->post_title );
				}
			} elseif ( isset( $user ) && absint( $user ) ) {
				if ( is_multisite() && is_network_admin() ) {
					$api = 'user-network';
				} else {
					$api = 'user';
				}
				$user_obj = get_user_by( 'id', absint( $user ) );
				if ( is_object( $user_obj ) && ! is_wp_error( $user_obj ) && isset( $user_obj->display_name ) ) {
					$this->panel_object = $user_obj;
					$this->page_title   = esc_attr( $this->page_title ) . ' for ' . esc_attr( $user_obj->display_name );
				}
			} elseif ( isset( $term ) && absint( $term ) ) {
				$api      = 'term';
				$term_obj = get_term( absint( $term ) );
				if ( is_object( $term_obj ) && ! is_wp_error( $term_obj ) && isset( $term_obj->name ) ) {
					$this->panel_object = $term_obj;
					$this->page_title   = esc_attr( $this->page_title ) . ' for ' . esc_attr( $term_obj->name );
				}
			} elseif ( is_multisite() && is_network_admin() ) {
				$api = 'network';
			} else {
				$api = 'site';
			}
		} else {
			$api = '';
		}

		// Safety valve for all metadata apis to prevent creating arbitrary meta for non-existent objects.
		if ( ! empty( $api ) && 'network' !== $api && 'site' !== $api ) {
			if ( empty( $this->panel_object ) || is_wp_error( $this->panel_object ) ) {
				$api = null; // Use null here to distinguish between empty string above and failure here.
			}
		}

		/**
		 * Allow api auto detection if 'api' not set in config, but if it doesn't match what was determined above then
		 * ignore the presumed API and defined config value (will ignore &term=1 param when $config['api] === 'site' or
		 * 'network' to prevent accidental override)
		 */
		if ( null !== $api && $api !== $this->api ) {
			return $this->api;
		}

		return $api;
	}

	/**
	 * Get WP Object ID
	 *
	 * @return int|null
	 */
	public function maybe_capture_wp_object_id() {
		switch ( $this->api ) {
			case 'post':
				return array_key_exists( 'post', $_GET ) ? filter_input( INPUT_GET, 'post' ) : null;
			case 'user':
				return array_key_exists( 'user', $_GET ) ? filter_input( INPUT_GET, 'user' ) : null;
			case 'term':
				return array_key_exists( 'term', $_GET ) ? filter_input( INPUT_GET, 'term' ) : null;
			default:
				return null;
		}
	}

	/**
	 * Get class name without versioned namespace.
	 *
	 * @return string
	 */
	public function get_clean_classname() {
		return strtolower( explode( '\\', get_called_class() )[2] );
	}

	/**
	 * Section footer page in callback_footer_html()
	 *
	 * @return void
	 */
	public function callback_footer_html() {
		?>
		<ul>
			<li>Sections: <code><?php echo esc_attr( $this->section_count ); ?></code></li>
			<li>Total Data Parts: <code><?php echo esc_attr( $this->data_count ); ?></code></li>
			<li>Total Parts: <code><?php echo esc_attr( $this->part_count ); ?></code></li>
		</ul>
		<?php
	}

	/**
	 * Used as the public function to add fields to the section.
	 *
	 * @param string $section_slug Page URL.
	 * @param object $params       Section params.
	 *
	 * @return Mixed
	 */
	public function add_section( $section_slug, $params ) {
		$section = new Section( $this, $section_slug, $params );

		return $this->add_part( $section );
	}

	/**
	 * Method used to add parts (sections/fields/markup/etc) to a Panel
	 *
	 * @param \WPOP\V_5_0\Section $section object One of the part classes from this file.
	 *
	 * @return \WPOP\V_5_0\Section
	 */
	public function add_part( &$section ) {
		$length = array_push( $this->parts, $section );
		// TODO: Move counter to Section constructor.
		if ( is_a( $section, 'WPOP\V_5_0\Section' ) ) {
			$this->section_count ++;
		}

		return $this->parts[ $length - 1 ];
	}

}
