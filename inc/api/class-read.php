<?php

namespace WPOP\V_4_0;

class Read {

	public $response;
	protected $type;
	protected $key;
	protected $obj_id;
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
		if ( false !== wp_verify_nonce( $panel_id, $panel_id ) ) {
			return false; // check for nonce, only allow panel to use this class
		}
		$this->type   = $type;
		$this->key    = $key;
		$this->obj_id = $obj_id;
		$this->single = $single;
		$this->get_data();

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
