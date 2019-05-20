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
	 * Field is encrypted using 256-bit encryption using mcrypt and then run through base64 for db env parity/safety
	 *
	 * @param string $unencrypted_string Password or API key to encrypt.
	 *
	 * @deprecated 5.0 Not supported by PHP 7.2
	 *
	 * @return string
	 */
	public static function mcrypt_encrypt( $unencrypted_string ) {
		return base64_encode(
			mcrypt_encrypt(
				MCRYPT_RIJNDAEL_256,
				WPOP_ENCRYPTION_KEY,
				$unencrypted_string,
				MCRYPT_MODE_ECB
			)
		);
	}

	/**
	 * 📢 ⚠️ NEVER USE TO PRINT IN MARKUP, IN INPUT VALUES -- ONLY CALL IN SERVER-SIDE ACTIONS OR RISK THEFT ⚠️ 📢
	 *
	 * Field is base64 decoded, then decrypted using mcrypt, then trimmed of any excess characters left from transforms
	 *
	 * @param string $encrypted_encoded Encrypted value to decrypt.
	 *
	 * @deprecated 5.0 Not supported by PHP 7.2
	 *
	 * @return string
	 */
	public static function mcrypt_decrypt( $encrypted_encoded ) {
		return trim(
			mcrypt_decrypt(
				MCRYPT_RIJNDAEL_256,
				WPOP_ENCRYPTION_KEY,
				base64_decode( $encrypted_encoded ),
				MCRYPT_MODE_ECB
			)
		);
	}

}
