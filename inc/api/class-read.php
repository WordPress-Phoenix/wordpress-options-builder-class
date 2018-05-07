<?php

namespace WPOP\V_4_1;

/**
 * Class Read
 * @package WPOP\V_4_0
 */
class Read {

	/**
	 * @var string|mixed
	 *
	 */
	public $response;
	/**
	 * @var string - internally-defined to decide which WP API to use
	 */
	protected $type;
	/**
	 * @var string - a string key used for storage in database
	 */
	protected $key;
	/**
	 * @var null|int - used for metadata APIs, contains ID for Post, Term or User.
	 */
	protected $obj_id;
	/**
	 * @var bool -
	 */
	protected $single;

	/**
	 * Read constructor.
	 *
	 * @param      $panel_id
	 * @param      $type
	 * @param      $key
	 * @param null $default
	 * @param null $obj_id
	 * @param bool $single
	 */
	function __construct( $panel_id, $type, $key, $default = null, $obj_id = null, $single = true ) {
		$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		if ( ! is_object( $current_screen ) || false === stripos( $current_screen->id, $panel_id ) ) {
			return false; // only let panel page use that class to read db
		}
		$this->type   = $type;
		$this->key    = $key;
		$this->obj_id = $obj_id;
		$this->single = $single;
		// 1. Data API switchboard
		$this->get_data();
		// 2. Return data for use by field

		return $this->response;
	}

	/**
	 * Retrieves value from Database APIs
	 */
	function get_data() {
		switch ( $this->type ) {
			case 'site':
				$this->response = get_option( $this->key, '' );
				break;
			case 'network':
				$this->response = get_site_option( $this->key );
				break;
			case 'user': // single-site user option, or per-site user option in multisite
				$this->response = is_multisite() ? get_user_option( $this->key, $this->obj_id )
					: get_metadata( 'user', $this->obj_id, $this->key, $this->single );
				break; // traditional user meta
			case 'user-network': // user network option applied globally across all blogs/sites
				$this->response = get_metadata( 'user', $this->obj_id, $this->key, $this->single );
				break;
			case 'term':
				$this->response = get_metadata( 'term', $this->obj_id, $this->key, $this->single );
				break;
			case 'post':
				$this->response = get_metadata( 'post', $this->obj_id, $this->key, $this->single );
				break;
			default:
				$this->response = false;
				break;
		}
	}
}
