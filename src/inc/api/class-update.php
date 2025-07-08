<?php
/**
 * Update
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

use WP_Error;

/**
 * Class Update
 */
class Update {
	/**
	 * Update constructor.
	 *
	 * @param string $page_slug Page URL.
	 * @param string $type      Type.
	 * @param string $key       Key.
	 * @param string $value     Value.
	 * @param null   $obj_id    Object ID.
	 * @param bool   $autoload  Autoload status.
	 */
	public function __construct( $page_slug, $type, $key, $value, $obj_id = null, $autoload = true ) {
		// Confirms both that POST is happening and that _wpnonce was sent, otherwise returns false to not try updates.
		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return false;
		}
		$wpnonce = isset( $_POST['_wpnonce'] ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;

		// Only allow class to be used by panel OR encrypted pwds never updated after insert.
		if ( ! wp_verify_nonce( $wpnonce, $page_slug ) || '### wpop-encrypted-pwd-field-val-unchanged ###' === $value ) {
			return false;
		}

		return $this->save_data( $page_slug, $type, $key, $value, $obj_id, $autoload );
	}

	/**
	 * Save Data
	 *
	 * @param string $page_slug Page URL.
	 * @param string $type      Type.
	 * @param string $key       Key.
	 * @param string $value     Value.
	 * @param null   $obj_id    Object ID.
	 * @param bool   $autoload  Autoload status.
	 *
	 * @return bool|int|\WP_Error
	 */
	private function save_data( $page_slug, $type, $key, $value, $obj_id = null, $autoload = true ) {
		switch ( $type ) {
			case 'site':
				return self::handle_site_option_save( $key, $value, $autoload );
			case 'network':
				return self::handle_network_option_save( $key, $value );
			case 'user':
				return self::handle_user_site_meta_save( $obj_id, $key, $value );
			case 'user-network':
				return self::handle_user_network_meta_save( $obj_id, $key, $value );
			case 'term':
				return self::handle_term_meta_save( $obj_id, $key, $value );
			case 'post':
				return self::handle_post_meta_save( $obj_id, $key, $value );
			default:
				return new WP_Error(
					'400',
					'WPOP panel ' . $page_slug . 'failed to select proper WordPress Data API -- check your config.',
					compact( $type, $key, $value, $obj_id, $autoload )
				);
		}
	}

	/**
	 * Site option save callback
	 *
	 * @param string $key      Key.
	 * @param string $value    Value.
	 * @param bool   $autoload Autoload status.
	 *
	 * @return bool
	 */
	private static function handle_site_option_save( $key, $value, $autoload ) {
		return empty( $value ) ? delete_option( $key ) : update_option( $key, $value, $autoload );
	}

	/**
	 * Network option save callback
	 *
	 * @param string $key   Key.
	 * @param string $value Value.
	 *
	 * @return bool
	 */
	private static function handle_network_option_save( $key, $value ) {
		return empty( $value ) ? delete_site_option( $key ) : update_site_option( $key, $value );
	}

	/**
	 * User per site meta save callback
	 *
	 * @param int    $user_id Users ID.
	 * @param string $key     Key.
	 * @param string $value   Value.
	 *
	 * @return bool
	 */
	private static function handle_user_site_meta_save( $user_id, $key, $value ) {
		return empty( $value ) ? delete_metadata( 'user', $user_id, $key ) : update_metadata( 'user', $user_id, $key, $value );
	}

	/**
	 * User network wide meta save callback
	 *
	 * @param int    $id    Users ID.
	 * @param string $key   Key.
	 * @param string $value Value.
	 *
	 * @return bool
	 */
	private static function handle_user_network_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_user_option( $id, $key, true ) : update_user_option( $id, $key, true );
	}

	/**
	 * Term meta save callback
	 *
	 * @param int    $id    Term ID.
	 * @param string $key   Key.
	 * @param string $value Value.
	 *
	 * @return bool
	 */
	private static function handle_term_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_metadata( 'term', $id, $key ) : update_metadata( 'term', $id, $key, $value );
	}

	/**
	 * Post meta save callback
	 *
	 * @param int    $id    Post ID.
	 * @param string $key   Key.
	 * @param string $value Value.
	 *
	 * @return bool
	 */
	private static function handle_post_meta_save( $id, $key, $value ) {
		return empty( $value ) ? delete_post_meta( $id, $key ) : update_post_meta( $id, $key, $value );
	}
}
