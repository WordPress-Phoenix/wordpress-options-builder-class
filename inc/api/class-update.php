<?php

namespace WPOP\V_4_1;

/**
 * Class Update
 * @package WPOP\V_4_0
 */
class Update {
	/**
	 * Update constructor.
	 *
	 * @param      $panel_id
	 * @param      $type
	 * @param      $key
	 * @param      $value
	 * @param null $obj_id
	 * @param bool $autoload
	 */
	function __construct( $panel_id, $type, $key, $value, $obj_id = null, $autoload = true ) {
		$wpnonce = isset( $_GET['_wpnonce'] ) ? filter_input( INPUT_POST, '_wpnonce' ) : null;
		// only allow class to be used by panel OR encrypted pwds never updated after insert
		if ( ! wp_verify_nonce( $wpnonce, $panel_id ) || '### wpop-encrypted-pwd-field-val-unchanged ###' === $value ) {
			return false;
		}
		return $this->save_data( $panel_id, $type, $key, $value, $obj_id, $autoload );
	}

	/**
	 * @param      $panel_id
	 * @param      $type
	 * @param      $key
	 * @param      $value
	 * @param null $obj_id
	 * @param bool $autoload
	 *
	 * @return bool|int|\WP_Error
	 */
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
		return empty( $value ) ? delete_metadata( 'user', $user_id, $key ) : update_metadata( 'user', $user_id, $key, $value );
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
