<?php
/**
 * Editor (TinyMCE)
 *
 * @package    WordPress
 * @subpackage WPOP
 */

namespace WPOP\V_5_0;

/**
 * Class Editor
 */
class Editor extends Part {

	/**
	 * Input Type
	 *
	 * @var string
	 */
	public $input_type = 'editor';

	/**
	 * Data store status.
	 *
	 * @var bool
	 */
	public $data_store = true;

	/**
	 * Main render function
	 */
	public function render() {
		wp_editor(
			stripslashes( $this->get_saved() ),
			$this->id . '_editor', // Unique editor ID.
			[
				'textarea_name' => $this->id, // Field key used for DB storage.
				'tinymce'       => [ 'min_height' => 300 ],
				'editor_class'  => 'edit',
				'quicktags'     => isset( $this->no_quicktags ) ? false : true,
				'teeny'         => isset( $this->teeny ) ? true : false,
				'media_buttons' => isset( $this->no_media ) ? false : true,
			]
		);
	}
}
