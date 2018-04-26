<?php

namespace WPOP\V_4_1;


/**
 * Class password
 * @package WPOP\V_2_8
 * @notes   how to use: echo $this->decrypt( get_option( $this->id ) );
 */
class Password extends Input {
	public $input_type = 'password';

	public function __construct( $i, $args = [] ) {
		parent::__construct( $i, $args );
	}

	public function render() {
		$this->input();
		echo '<a href="#" class="button pwd-clear">clear</a>';
		$this->input( 'stored_' . $this->id, 'hidden', $this->saved );
	}

	/**
	 * Fixes PHP7 issues where mcrypt_decrypt expects a specific key size. Used on WPOP_ENCRYPTION_KEY constant.
	 * You'll still have to run trim on the end result when decrypting,as seen in the "unencrypted_pass" function.
	 *
	 * @see http://stackoverflow.com/questions/27254432/mcrypt-decrypt-error-change-key-size
	 *
	 * @param $key
	 *
	 * @return bool|string
	 */
	static function pad_key( $key ) {

		if ( strlen( $key ) > 32 ) { // key too large
			return false;
		}

		$sizes = array( 16, 24, 32 );

		foreach ( $sizes as $s ) { // loop sizes, pad key
			while ( strlen( $key ) < $s ) {
				$key = $key . "\0";
			}
			if ( strlen( $key ) == $s ) {
				break; // finish if the key matches a size
			}
		}

		return $key;
	}

	/**
	 * Field is encrypted using 256-bit encryption using mcrypt and then run through base64 for db env parity/safety
	 *
	 * @param $unencrypted_string
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
	 * @param $encrypted_encoded
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
}
