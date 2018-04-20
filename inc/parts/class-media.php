<?php

namespace WPOP\V_4_0;

/**
 * Class Media
 * @package WPOP\V_3_0
 */
class Media extends Part {
	public $media_label = 'Image';
	public $input_type = 'media';
	public $data_store = true;

	public function render() {
		$saved        = array(
			'url' => '',
			'id' => '',
		);
		$insert_label = 'Insert ' . esc_html( $this->media_label );
		if ( ! empty( $this->get_saved() ) && absint( $this->get_saved() ) ) {
			$img = wp_get_attachment_image_src( $this->get_saved() );
			$saved        = array( 'url' => is_array( $img ) ? $img[0] : 'err', 'id' => $this->get_saved() );
			$insert_label = esc_html( 'Replace ' . $this->media_label );
		} ?>
		<div class="blank-img" style="display:none"></div>
		<input id="<?php esc_attr_e( $this->id . '_button' ); ?>" type="button" class="button button-hero img-upload"
		       data-media-label="<?php esc_attr_e( $this->media_label ); ?>" data-id="<?php esc_attr_e( $this->id ); ?>"
		       value="<?php esc_attr_e( $insert_label ); ?>"
		       data-button="<?php esc_attr_e( 'Use ' . $this->media_label ); ?>"
		       data-title="<?php esc_attr_e( 'Select or Upload ' . $this->media_label ); ?>" />
		<input id="<?php esc_attr_e( $this->id ); ?>" name="<?php esc_attr_e( $this->id ); ?>" type="hidden"
		       value="<?php esc_attr_e( $saved['id'] ); ?>"
		       data-part="<?php strtolower( $this->get_clean_classname() ); ?>" />
		<a href="#" class="button img-remove" data-media-label="<?php esc_attr_e( $this->media_label ); ?>">
			<?php esc_html_e( 'Remove ' . $this->media_label ); ?>
		</a>
		<?php
	}

}
