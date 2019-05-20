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
	public $api = null;

	/**
	 * Panel ID
	 *
	 * @var null|string slug or title of a panel
	 */
	public $id = null;

	/**
	 * Required Capabilities
	 *
	 * @var string Matches WordPress capabilities required to access this set of options.
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
	 * Container constructor.
	 *
	 * @param array $args     Arguments used to customize instance of this class.
	 * @param array $sections Sections (vertical tabs) to create as a part of this options set.
	 */
	public function __construct( $args = [], $sections = [] ) {
		if ( ! isset( $args['id'] ) ) {
			echo 'Setting a panel ID is required';
			exit;
		}

		if ( ! defined( 'WPOP_ENCRYPTION_KEY' ) ) {
			// IMPORTANT: If you don't define a key, the class hashes the AUTH_KEY found in wp-config.php,
			// locking the encrypted value to the current environment.
			$trimmed_key = substr( wp_salt(), 0, 15 );
			define( 'WPOP_ENCRYPTION_KEY', Mcrypt::pad_key( sha1( $trimmed_key, true ) ) );
		}

		if ( ! defined( 'WPOP_OPENSSL_ENCRYPTION_KEY' ) ) {
			// IMPORTANT: If you don't define a key, the class hashes the AUTH_KEY found in wp-config.php,
			// locking the encrypted value to the current environment.
			define( 'WPOP_OPENSSL_ENCRYPTION_KEY', hash( 'sha256', wp_salt(), true ) );
		}

		// Establish panel id.
		$this->id = preg_replace( '/_/', '-', $args['id'] );

		// Magic-set class object vars from array.
		foreach ( $args as $key => $val ) {
			$this->$key = $val;
		}

		// Establish data storage api.
		$this->api = $this->detect_data_api_and_permissions();

		// Maybe establish WordPress object id when api is one of the metadata APIs.
		$this->obj_id = $this->maybe_capture_wp_object_id();

		// Loop over sections.
		foreach ( $sections as $section_id => $section ) {
			if ( ! isset( $section['parts'] ) ) {
				return;
			}

			$this->section_count++;

			// Loop over current section's parts.
			foreach ( $section['parts'] as $part_id => $part_config ) {
				$current_part_classname    = __NAMESPACE__ . '\\' . $part_config['part'];
				$part_config['obj_id']     = $this->obj_id;
				$part_config['panel_id']   = $this->id;
				$part_config['section_id'] = $section_id;
				$part_config['panel_api']  = $this->api;

				// Create part class.
				$current_part = new $current_part_classname( $part_id, $part_config );

				// Add part to panel/section.
				$this->add_part( $section_id, $section, $current_part );
				$this->part_count++;

				if ( is_object( $current_part ) && $current_part->data_store ) {
					$this->data_count++;

					if ( $current_part->updated && isset( $this->updated_counts[ $current_part->update_type ] ) ) {
						$this->updated_counts[ $current_part->update_type ]++;
					}
				}
			}

			$update_message = '';

			foreach ( $this->updated_counts as $count_type => $count ) {
				$update_message .= $count . ' ' . ucfirst( $count_type ) . '. ';
			}

			$this->notifications = [ 'notification' => $update_message ];
		}
	}

	/**
	 * Default string representing Class object
	 *
	 * @return null|string
	 */
	public function __toString() {
		return $this->id;
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
				if ( is_multisite() && is_network_admin() && ! self::is_wordpress_vip_or_vip_go() ) {
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
			} elseif ( is_multisite() && is_network_admin() && ! self::is_wordpress_vip_or_vip_go() ) {
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
	 * Check for Automattic server constants denoting we shouldn't add network options or switch_to_blog()
	 *
	 * @return bool
	 */
	public static function is_wordpress_vip_or_vip_go() {
		$is_vip    = ( defined( 'WPCOM_IS_VIP_ENV' ) && true === WPCOM_IS_VIP_ENV ) ? true : false;
		$is_vip_go = ( defined( 'VIP_GO_ENV' ) && ! empty( VIP_GO_ENV ) ) ? true : false;

		return ( $is_vip || $is_vip_go ) ? true : false;
	}

	/**
	 * Old external developer method used to add parts (sections/fields/markup/etc) to a Panel
	 *
	 * Now used internally, but still available public
	 *
	 * @param string  $section_id Section ID.
	 * @param Section $section    Section Object.
	 * @param Part    $part       object One of the part classes from this file.
	 */
	public function add_part( $section_id, $section, $part ) {
		if ( ! isset( $this->parts[ $section_id ] ) ) {
			$this->parts[ $section_id ]          = $section;
			$this->parts[ $section_id ]['parts'] = [];
		}

		array_push( $this->parts[ $section_id ]['parts'], $part );
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
	 * Get class name without versioned namespace.
	 *
	 * @return string
	 */
	public function get_clean_classname() {
		return strtolower( explode( '\\', get_called_class() )[2] );
	}

}
