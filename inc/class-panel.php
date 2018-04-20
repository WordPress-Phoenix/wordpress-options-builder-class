<?php

namespace WPOP\V_4_0;

class Panel {
	/**
	 * @var null - string used by class to determine wordpress data api
	 */
	public $api = null;

	/**
	 * @var null|string - string/slug for a panel
	 */
	public $id = null;

	/**
	 * @var string - capability user must have for panel to display.
	 */
	public $capability = 'manage_options';

	/**
	 * @var array - array of fields (aka parts because fields can also be file includes or markup)
	 */
	public $parts = [];

	/**
	 * @var array - string notifications to print at top of panel
	 */
	public $notifications = [];

	/**
	 * @var null|void - preset with WP Core Object ID from query param
	 * @see $this->maybe_capture_wp_object_id();
	 */
	public $obj_id = null;

	/**
	 * @var
	 */
	public $page_title;

	/**
	 * @var
	 */
	public $panel_object;

	/**
	 * @var int
	 */
	public $part_count = 0;

	/**
	 * @var int
	 */
	public $section_count = 0;

	/**
	 * @var int
	 */
	public $data_count = 0;

	/**
	 * @var array used to track what happens during save process
	 */
	public $updated_counts = array(
		'created' => 0,
		'updated' => 0,
		'deleted' => 0,
	);

	/**
	 * Container constructor.
	 *
	 * @param array $args
	 * @param array $sections
	 */
	public function __construct( $args = [], $sections = [] ) {
		if ( ! isset( $args['id'] ) ) {
			echo "Setting a panel ID is required";
			exit;
		}
		if ( ! defined( 'WPOP_ENCRYPTION_KEY' ) ) {
			// IMPORTANT: If you don't define a key, the class hashes the AUTH_KEY found in wp-config.php,
			// locking the encrypted value to the current environment.
			$trimmed_key = substr( wp_salt(), 0, 15 );
			define( 'WPOP_ENCRYPTION_KEY', Password::pad_key( sha1( $trimmed_key, true ) ) );
		}
		// establish panel id
		$this->id = preg_replace( '/_/', '-', $args['id'] );

		// magic-set class object vars from array
		foreach ( $args as $key => $val ) {
			$this->$key = $val;
		}

		// establish data storage api
		$this->api = $this->detect_data_api_and_permissions();

		// maybe establish wordpress object id when api is one of the metadata APIs
		$this->obj_id = $this->maybe_capture_wp_object_id();

		// loop over sections
		foreach ( $sections as $section_id => $section ) {
			if ( isset( $section['parts'] ) ) {
				$this->section_count ++;
				// loop over current section's parts
				foreach ( $section['parts'] as $part_id => $part_config ) {
					$current_part_classname    = __NAMESPACE__ . '\\' . $part_config['part'];
					$part_config['obj_id']     = $this->obj_id;
					$part_config['panel_id']   = $this->id;
					$part_config['section_id'] = $section_id;
					$part_config['panel_api']  = $this->api;

					// create part class
					$current_part = new $current_part_classname( $part_id, $part_config );

					// add part to panel/section
					$this->add_part( $section_id, $section, $current_part );
					$this->part_count ++;
					if ( is_object( $current_part ) && $current_part->data_store ) {
						$this->data_count ++;
						if ( $current_part->updated ) {
							if ( isset( $this->updated_counts[ $current_part->update_type ] ) ) {
								$this->updated_counts[ $current_part->update_type ] ++;
							}
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
	}

	/**
	 * @return null|string|string
	 */
	public function __toString() {
		return $this->id;
	}

	/**
	 * Listen for query parameters denoting Post, User or Term object IDs for metadata api or network/site option apis
	 */
	public function detect_data_api_and_permissions() {
		$api  = null;
		$page = isset( $_GET['page'] ) ? filter_input( INPUT_GET, 'page' ) : null;
		$post = isset( $_GET['post'] ) ? filter_input( INPUT_GET, 'post' ) : null;
		$user = isset( $_GET['user'] ) ? filter_input( INPUT_GET, 'user' ) : null;
		$term = isset( $_GET['term'] ) ? filter_input( INPUT_GET, 'term' ) : null;
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

		// safety valve for all metadata apis to prevent creating arbitrary meta for non-existent objects
		if ( ! empty( $api ) && 'network' !== $api && 'site' !== $api ) {
			if ( empty( $this->panel_object ) || is_wp_error( $this->panel_object ) ) {
				$api = null; // use null here to distinguish between empty string above and failure here
			}
		}

		// allow api auto detection if 'api' not set in config, but if it doesn't match what was determined above
		// then ignore the presumed API and defined config value
		//  (will ignore &term=1 param when $config['api] === 'site' or 'network' to prevent accidental override)
		if ( null !== $api && $api !== $this->api ) {
			return $this->api;
		}

		return $api;
	}

	/**
	 * @return int|null
	 */
	public function maybe_capture_wp_object_id() {
		switch ( $this->api ) {
			case 'post':
				return isset( $_GET['post'] ) ? filter_input( INPUT_GET, 'post' ) : null;
				break;
			case 'user':
				return isset( $_GET['user'] ) ? filter_input( INPUT_GET, 'user' ) : null;
				break;
			case 'term':
				return isset( $_GET['term'] ) ? filter_input( INPUT_GET, 'term' ) : null;
				break;
			default:
				return null;
				break;
		}
	}

	/**
	 * Old external developer method used to add parts (sections/fields/markup/etc) to a Panel
	 *
	 * Now used internally, but still available public
	 *
	 * @param $section_id
	 * @param $section
	 * @param $part object - one of the part classes from this file
	 */
	public function add_part( $section_id, $section, $part ) {
		if ( ! isset( $this->parts[ $section_id ] ) ) {
			$this->parts[ $section_id ]          = $section;
			$this->parts[ $section_id ]['parts'] = array();
		}

		array_push( $this->parts[ $section_id ]['parts'], $part );
	}

	/**
	 * Print WordPress Admin Notifications
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
	 * @param $notification
	 */
	public function single_notification( $notification ) {
		$data      = is_array( $notification ) ? $notification : [ 'notification' => $notification ];
		$note_type = isset( $data['type'] ) ? $data['type'] : 'notice-success';
		?>
		<div class="notice <?php esc_attr_e( $note_type ); ?>">
			<p><strong><?php esc_html_e( $this->page_title ); ?></strong> //
				<?php esc_html_e( $data['notification'] ); ?>
			</p>
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
