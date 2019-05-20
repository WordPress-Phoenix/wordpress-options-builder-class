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
	 * OpenSSL encrypt technique (PHP 7.2+ compatible)
	 *
	 * @see https://paragonie.com/blog/2015/05/if-you-re-typing-word-mcrypt-into-your-code-you-re-doing-it-wrong
	 *
	 * @param string $message String to encrypt.
	 * @param string $key     Key to encrypt with.
	 *
	 * @throws \Exception Custom error output.
	 *
	 * @return string
	 */
	public static function encrypt( $message ) {
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
	 * Decrypt the string with the appropriate method.
	 *
	 * @param string $encrypted_string The encrypted string.
	 *
	 * @return string
	 */
	public static function decrypt( $encrypted_string ) {
		$result = static::openssl_decrypt( $encrypted_string );

		// If we can successfully decrypt, return now.
		if ( false !== $result ) {
			return $result;
		}

		// Potentially upgrade the legacy password value.
		return Mcrypt::upgrade_mcrypt_option( $encrypted_string );
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
