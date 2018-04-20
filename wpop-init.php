<?php
/**
 * [WPOP] WordPress Phoenix Options Panel - Field Builder Classes
 *
 * @authors 🌵 WordPress Phoenix 🌵 / Seth Carstens, David Ryan
 * @package wpop
 * @version 3.1.0
 * @license GPL-2.0+ - please retain comments that express original build of this file by the author.
 */

namespace WPOP\V_4_0;

/**
 * Some tips:
 * * Panels/Pages contain Sections, Sections contain Parts (which are either option inputs or markup for display)
 */
if ( ! function_exists( 'add_filter' ) ) { // avoid direct calls to file
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

require_once 'inc/class-part.php';
require_once 'inc/parts/class-input.php';
require_once 'inc/parts/class-text.php';

require_once 'inc/parts/class-checkbox.php';
require_once 'inc/parts/class-color.php';
require_once 'inc/parts/class-editor.php';
require_once 'inc/parts/class-email.php';
require_once 'inc/parts/class-include-partial.php';
require_once 'inc/parts/class-markdown.php';
require_once 'inc/parts/class-media.php';
require_once 'inc/parts/class-multiselect.php';
require_once 'inc/parts/class-number.php';
require_once 'inc/parts/class-radio-buttons.php';
require_once 'inc/parts/class-select.php';
require_once 'inc/parts/class-textarea.php';
require_once 'inc/parts/class-toggle-switch.php';
require_once 'inc/parts/class-url.php';


require_once 'inc/class-assets.php';
require_once 'inc/class-section.php';
require_once 'inc/class-panel.php';
require_once 'inc/class-page.php';





/**
 * Helper used by panel for tapping various WordPress APIs
 *
 * Class Get_Single_Field
 * @package WPOP\V_3_0
 */
class Get_Single_Field {

	public $response;

	protected $type;
	protected $key;
	protected $obj_id;
	protected $single;

	/**
	 * Get_Single_Field constructor.
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

	function get_data() {
		switch ( $this->type ) {
			case 'site':
				$this->response = get_option( $this->key, '' );
				break;
			case 'network':
				$this->response = get_site_option( $this->key );
				break;
			case 'user': // single-site user option, or per-site user option in multisite
				$this->response = is_multisite() ? get_user_option( $this->key, $this->obj_id ) : get_user_meta( $this->obj_id, $this->key, $this->single );
				break; // traditional user meta
			case 'user-network': // user network option applied globally across all blogs/sites
				$this->response = get_user_meta( $this->obj_id, $this->key, $this->single );
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

/**
 * Class Save_Single_Field
 * @package WPOP\V_3_0
 */
class Save_Single_Field {
	/**
	 * Save_Single_Field constructor.
	 *
	 * @param      $panel_id
	 * @param      $type
	 * @param      $key
	 * @param      $value
	 * @param null $obj_id
	 * @param bool $autoload
	 */
	function __construct( $panel_id, $type, $key, $value, $obj_id = null, $autoload = true ) {
		if ( ! wp_verify_nonce( $_POST['_wpnonce'], $panel_id )            // only allow class to be used by panel
		     || '### wpop-encrypted-pwd-field-val-unchanged ###' === $value // encrypted pwds never updated after insert
		) {
			return false;
		}

		return $this->save_data( $panel_id, $type, $key, $value, $obj_id, $autoload );
	}

	private function save_data( $panel_id, $type, $key, $value, $obj_id = null, $autoload = true ) {
		switch ( $type ) {
			case 'site':
				return self::handle_site_option_save( $key, $value, $autoload );
				break;
			case 'network':
				return self::handle_network_option_save( $key, $value );
				break;
			case 'user':
				return self::handle_user_site_meta_save( $obj_id, $key, $value );
				break; // traditional user meta
			case 'user-network':
				return self::handle_user_network_meta_save( $obj_id, $key, $value );
				break;
			case 'term':
				return self::handle_term_meta_save( $obj_id, $key, $value );
				break;
			case 'post':
				return self::handle_post_meta_save( $obj_id, $key, $value );
				break;
			default:
				return new \WP_Error(
					'400',
					'WPOP failed to select proper WordPress Data API -- check your config.',
					compact( $type, $key, $value, $obj_id, $autoload )
				);
				break;
		}
	}

	private static function handle_site_option_save( $key, $value, $autoload ) {
		return empty( $value ) ? delete_option( $key ) : update_option( $key, $value, $autoload );
	}

	private static function handle_network_option_save( $key, $value ) {
		return empty( $value ) ? delete_site_option( $key ) : update_site_option( $key, $value );
	}

	private static function handle_user_site_meta_save( $user_id, $key, $value ) {
		return empty( $value ) ? delete_user_meta( $user_id, $key ) : update_user_meta( $user_id, $key, $value );
	}

	private static function handle_user_network_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_user_option( $id, $key, true ) : update_user_option( $id, $key, true );
	}

	private static function handle_term_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_metadata( 'term', $id, $key ) : update_metadata( 'term', $id, $key, $value );
	}

	private static function handle_post_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_post_meta( $id, $key ) : update_post_meta( $id, $key, $value );
	}
}
