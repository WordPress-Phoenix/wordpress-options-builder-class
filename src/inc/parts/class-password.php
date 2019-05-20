<?php
/**
 * Password
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class password
 *
 * @notes   how to use: echo $this->decrypt( get_option( $this->id ) );
 */
class Password extends Input {

	/**
	 * This value is used during saving to denote new field value matches prior database value, preventing overwriting
	 * in the Update class
	 *
	 * @var string
	 */
	public static $default_existing_value = '### wpop-encrypted-pwd-field-val-unchanged ###';

	/**
	 * Input type
	 *
	 * @var string
	 */
	public $input_type = 'password';

	/**
	 * OpenSSL Encryption method
	 */
	const METHOD = 'aes-256-cbc';

	/**
	 * Password constructor.
	 *
	 * @param string $i    Slug or ID.
	 * @param array  $args Arguments to customize object instance.
	 */
	public function __construct( $i, $args = [] ) {
		parent::__construct( $i, $args );

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
		return Mcrypt::upgrade_mcrypt_option( $encrypted_string );
	}

	/**
	 * Encrypt a string via OpenSSL.
	 *
	 * @param string $message
	 *
	 * @see https://paragonie.com/blog/2015/05/if-you-re-typing-word-mcrypt-into-your-code-you-re-doing-it-wrong
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
			$key,
			OPENSSL_RAW_DATA,
			$iv
		);

		return $iv . $cipher_text;
	}

	/**
	 * OpenSSL decrypt technique (PHP 7.2+ compatible)
	 *
	 * 📢 ⚠️ NEVER USE TO PRINT IN MARKUP, IN INPUT VALUES -- ONLY CALL IN SERVER-SIDE ACTIONS OR RISK THEFT ⚠️ 📢
	 *
	 * @param string $message String to encrypt.
	 * @param string $key     Key to encrypt with.
	 *
	 * @throws \Exception Custom error output.
	 *
	 * @return string
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
			$key,
			OPENSSL_RAW_DATA,
			$iv
		);

		return $result;
	}

}
