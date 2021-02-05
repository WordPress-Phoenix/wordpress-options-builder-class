<?php
/**
 * Legacy mcrypt API handlers
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Mcrypt
 *
 * @package WPOP\V_4_0
 */
class Mcrypt {

	/**
	 * Utility function to help with key padding.
	 *
	 * Fixes PHP7 issues where mcrypt_decrypt expects a specific key size. Used on WPOP_ENCRYPTION_KEY constant.
	 * You'll still have to run trim on the end result when decrypting,as seen in the "unencrypted_pass" function.
	 *
	 * @see http://stackoverflow.com/questions/27254432/mcrypt-decrypt-error-change-key-size
	 *
	 * @param string $key Key.
	 *
	 * @return bool|string
	 */
	public static function pad_key( $key ) {
		if ( strlen( $key ) > 32 ) { // Key too large.
			return false;
		}

		$sizes = [ 16, 24, 32 ];

		foreach ( $sizes as $s ) { // Loop sizes, pad key.
			$key_length = strlen( $key );

			while ( $key_length < $s ) {
				$key        = $key . "\0";
				$key_length = strlen( $key );
			}

			if ( strlen( $key ) === $s ) {
				break; // Finish if the key matches a size.
			}
		}

		return $key;
	}

	/**
	 * Handle legacy strings encrypted via `mcrypt`.
	 *
	 * @param string $encrypted_string The possibly-mcrypted string.
	 *
	 * @return string
	 */
	public static function upgrade_mcrypt_option( $encrypted_string ) {
		// If we cannot successfully decrypt, try falling back to mcrypt and re-encrypting.
		$result = static::mcrypt_decrypt( $encrypted_string );

		// Could not decrypt; return nothing.
		if ( false === $result ) {
			return '';
		}

		// Re-encrypt with OpenSSL.
		Password::encrypt( $result );

		return $result;
	}

	/**
	 * 📢 ⚠️ NEVER USE TO PRINT IN MARKUP, IN INPUT VALUES -- ONLY CALL IN SERVER-SIDE ACTIONS OR RISK THEFT ⚠️ 📢
	 *
	 * Decrypt an mcrypt-encrypted string.
	 *
	 * @param string $encrypted_string Encrypted value to decrypt.
	 *
	 * @deprecated 5.0 Not supported by PHP 7.2
	 *
	 * @return string
	 */
	public static function mcrypt_decrypt( $encrypted_string ) {
		if ( version_compare( phpversion(), '7.2', '>=' ) ) {
			return new \WP_Error( 'php_version', __( 'PHP version is to low to support mcrypt_decrypt. This function has been DEPRECATED as of PHP 7.1.0 and REMOVED as of PHP 7.2.0. Relying on this function is highly discouraged.', 'wpop' ) );
		}

		// Throws errors depending on version of PHP. Added the catch above to account for this.
		// @codingStandardsIgnoreStart
		return trim(
			mcrypt_decrypt(
				MCRYPT_RIJNDAEL_256,
				WPOP_ENCRYPTION_KEY,
				$encrypted_string,
				MCRYPT_MODE_ECB
			)
		);
		// @codingStandardsIgnoreEnd
	}

}
