<?php

namespace WPOP\V_4_1;

/**
 * Class Editor
 * @package WPOP\V_3_0
 */
class Editor extends Part {
	/**
	 * @var string
	 */
	public $input_type = 'editor';
	/**
	 * @var bool
	 */
	public $data_store = true;
	/**
	 *
	 */
	public function render() {
		wp_editor(
			stripslashes( $this->get_saved() ),
			$this->id . '_editor', // unique editor ID
			array(
				'textarea_name' => $this->id, // field key used for DB storage
				'tinymce'       => array( 'min_height' => 300 ),
				'editor_class'  => 'edit',
				'quicktags'     => isset( $this->no_quicktags ) ? false : true,
				'teeny'         => isset( $this->teeny ) ? true : false,
				'media_buttons' => isset( $this->no_media ) ? false : true,
			)
		);
	}
}
