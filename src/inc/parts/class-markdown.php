<?php
/**
 * Markdown
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_4_1;

/**
 * Class Markdown
 *
 * @package WPOP\V_4_1
 */
class Markdown extends Include_Partial {
	/**
	 * Field Type
	 *
	 * @var string
	 */
	public $field_type = 'markdown_file';

	/**
	 * Main render function for the field.
	 *
	 * @return string
	 */
	public function render() {
		if ( is_file( $this->filename ) && class_exists( '\\Parsedown' ) ) {
			$converter = new \Parsedown();
			$markup    = static::file_get_contents( $this->filename );
			if ( ! empty( $markup ) ) {
				return 'To do, fix markdown field.';
			}
			return 'Markup was empty.';
		} else {
			return 'File Status: ' . strval( is_file( $this->filename ) ) . ' and class exists: ' . strval( class_exists( '\\Parsedown' ) );
		}
	}
}
