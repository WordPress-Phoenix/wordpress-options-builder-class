<?php
/**
 * Password
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0\Fields;

use WPOP\V_5_0\Mcrypt;
use WPOP\V_5_0\Part;

/**
 * Class password
 *
 * @notes   how to use: echo $this->decrypt( get_option( $this->id ) );
 */
class Password extends Part {
	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'password';

	/**
	 * This value is used during saving to denote new field value matches prior database value, preventing overwriting
	 * in the Update class
	 *
	 * @var string
	 */
	public static $default_existing_value = '### wpop-encrypted-pwd-field-val-unchanged ###';

	/**
	 * Data store status
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * OpenSSL Encryption method
	 */
	const METHOD = 'aes-256-cbc';

	/**
	 * Password constructor.
	 *
	 * @param \WPOP\V_5_0\Section $section Reference to the parent object (Panel) where this section lives.
	 * @param string              $i       Slug or ID.
	 * @param array               $args    Arguments to customize object instance.
	 */
	public function __construct( &$section, $i, $args = [] ) {
		parent::__construct( $section, $i, $args );

		if ( ! defined( 'WPOP_EXISTING_ENCRYPTED_VALUE' ) ) {
			define( 'WPOP_EXISTING_ENCRYPTED_VALUE', self::$default_existing_value );
		}
	}

	/**
	 * Main render function
	 */
	public function render() {
		$this->input();

		echo '<a href="#" class="button pwd-clear">clear</a>';

		$this->input( 'stored_' . $this->id, 'hidden' );
	}

	/**
	 * Encrypt a string.
	 *
	 * @param string $value String to encrypt.
	 *
	 * @return string
	 * @throws \Exception Custom error output.
	 */
	public static function encrypt( $value ) {
		$encrypted_string = static::openssl_encrypt( $value );

		// Encode the string so it can be safely saved to the DB.
		return base64_encode( $encrypted_string );
	}

	/**
	 * Decrypt a string, falling back to legacy encryption methods.
	 *
	 * @param string $encrypted_string The encrypted string.
	 *
	 * @return string
	 * @throws \Exception Custom error output.
	 */
	public static function decrypt( $encrypted_string ) {
		// Start by decoding the string.
		$encrypted_string = base64_decode( $encrypted_string );

		// Attempt decryption with OpenSSL.
		$result = static::openssl_decrypt( $encrypted_string );

		// If we can successfully decrypt, return now.
		if ( false !== $result ) {
			return $result;
		}

		// Potentially upgrade the legacy password value.
		if ( function_exists( 'mcrypt_decrypt' ) ) {
			$result = Mcrypt::upgrade_mcrypt_option( $encrypted_string );
		} else {
			$result = null;
			error_log( 'WordPress Options Panel Class ERROR: Encryption issue while decrypting value. Either they encryption key has changed requiring a reset of this field or an upgrade from mcrypt to openssl is impossible because mcrypt global function is not available on this servers version of PHP.' ); // @codingStandardsIgnoreLinegit
		}

		return $result;
	}

	/**
	 * Encrypt a string via OpenSSL. PHP 7.2+ compatible.
	 *
	 * @see https://paragonie.com/blog/2015/05/if-you-re-typing-word-mcrypt-into-your-code-you-re-doing-it-wrong
	 *
	 * @param string $message The value to encrypt.
	 *
	 * @throws \Exception Custom error output.
	 *
	 * @return string
	 */
	public static function openssl_encrypt( $message ) {
		if ( mb_strlen( WPOP_OPENSSL_ENCRYPTION_KEY, '8bit' ) !== 32 ) {
			throw new \Exception( 'Needs a 256-bit key!' );
		}

		$iv_size = openssl_cipher_iv_length( static::METHOD );
		$iv      = openssl_random_pseudo_bytes( $iv_size );

		$cipher_text = openssl_encrypt(
			$message,
			self::METHOD,
			WPOP_OPENSSL_ENCRYPTION_KEY,
			OPENSSL_RAW_DATA,
			$iv
		);

		return $iv . $cipher_text;
	}

	/**
	 * OpenSSL decrypt technique (PHP 7.2+ compatible).
	 * 📢 ⚠️ NEVER USE TO PRINT IN MARKUP, IN INPUT VALUES -- ONLY CALL IN SERVER-SIDE ACTIONS OR RISK THEFT ⚠️ 📢
	 *
	 * @param string $message String to decrypt.
	 *
	 * @return string
	 * @throws \Exception Custom error output.
	 */
	public static function openssl_decrypt( $message ) {
		if ( mb_strlen( WPOP_OPENSSL_ENCRYPTION_KEY, '8bit' ) !== 32 ) {
			throw new \Exception( 'Needs a 256-bit key!' );
		}

		$ivsize     = openssl_cipher_iv_length( self::METHOD );
		$iv         = mb_substr( $message, 0, $ivsize, '8bit' );
		$ciphertext = mb_substr( $message, $ivsize, null, '8bit' );

		$result = openssl_decrypt(
			$ciphertext,
			self::METHOD,
			WPOP_OPENSSL_ENCRYPTION_KEY,
			OPENSSL_RAW_DATA,
			$iv
		);

		return $result;
	}
}
