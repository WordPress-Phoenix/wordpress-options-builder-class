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
	 * Encryption type
	 *
	 * Default to mcrypt until its completely removed instead of deprecated.
	 *
	 * @var string
	 */
	public $encyption_type = 'mcrypt';

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
	 * Field is encrypted using 256-bit encryption using mcrypt and then run through base64 for db env parity/safety
	 *
	 * @param string $unencrypted_string Password or API key to encrypt.
	 *
	 * @deprecated 5.0 Not supported by PHP 7.2
	 *
	 * @return string
	 */
	public static function encrypt( $unencrypted_string ) {
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
	public static function decrypt( $encrypted_encoded ) {
		return trim(
			mcrypt_decrypt(
				MCRYPT_RIJNDAEL_256,
				WPOP_ENCRYPTION_KEY,
				base64_decode( $encrypted_encoded ),
				MCRYPT_MODE_ECB
			)
		);
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
	public static function openssl_encrypt( $message, $key ) {
		if ( mb_strlen( $key, '8bit' ) !== 32 ) {
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
	public static function openssl_decrypt( $message, $key ) {
		if ( mb_strlen( $key, '8bit' ) !== 32 ) {
			throw new \Exception( 'Needs a 256-bit key!' );
		}
		$ivsize     = openssl_cipher_iv_length( self::METHOD );
		$iv         = mb_substr( $message, 0, $ivsize, '8bit' );
		$ciphertext = mb_substr( $message, $ivsize, null, '8bit' );

		return openssl_decrypt(
			$ciphertext,
			self::METHOD,
			$key,
			OPENSSL_RAW_DATA,
			$iv
		);
	}
}
