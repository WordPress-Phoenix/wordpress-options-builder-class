<?php
/**
 * Read
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Read
 *
 * @package WPOP\V_4_0
 */
class Read {

	/**
	 * Response
	 *
	 * @var string|mixed
	 */
	public $response;

	/**
	 * Type
	 *
	 * @var string - internally-defined to decide which WP API to use
	 */
	protected $type;

	/**
	 * Key
	 *
	 * @var string - a string key used for storage in database
	 */
	protected $key;

	/**
	 * Object ID
	 *
	 * @var null|int - used for metadata APIs, contains ID for Post, Term or User.
	 */
	protected $obj_id;

	/**
	 * Is single object type status
	 *
	 * @var bool -
	 */
	protected $single;

	/**
	 * Read constructor.
	 *
	 * @param string $panel_id     Panel ID is a string slug.
	 * @param string $type         Type.
	 * @param string $key          Key.
	 * @param null   $default_val  Default.
	 * @param null   $obj_id       Object ID.
	 * @param bool   $single       Is single object type status.
	 */
	public function __construct( $panel_id, $type, $key, $default_val = null, $obj_id = null, $single = true ) {
		$this->type   = $type;
		$this->key    = $key;
		$this->obj_id = $obj_id;
		$this->single = $single;

		// 1. Data API switchboard
		$this->get_data();
	}

	/**
	 * Retrieves value from Database APIs
	 *
	 * @return void
	 */
	public function get_data() {
		switch ( $this->type ) {
			case 'site':
				$this->response = get_option( $this->key, '' );
				break;
			case 'network':
				$this->response = get_site_option( $this->key );
				break;
			case 'user': // Single-site user option, or per-site user option in multisite.
				$this->response = is_multisite() ? get_user_option( $this->key, $this->obj_id )
					: get_metadata( 'user', $this->obj_id, $this->key, $this->single );
				break; // Traditional user meta.
			case 'user-network': // User network option applied globally across all blogs/sites.
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
