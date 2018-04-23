<?php

namespace WPOP\V_4_0;

/**
 * Class Markdown
 * @package WPOP\V_3_1
 */
class Markdown extends Include_Partial {
	public $field_type = 'markdown_file';

	public function render() {
		if ( is_file( $this->filename ) && class_exists( '\\Parsedown' ) ) {
			$converter = new \Parsedown();
			$markup    = file_get_contents( $this->filename );
			if ( ! empty( $markup ) ) {
				// TODO: fix markdown field
			}
		} else {
			return 'File Status: ' . strval( is_file( $this->filename ) ) . ' and class exists: ' . strval( class_exists( '\\Parsedown' ) );
		}
	}
}
