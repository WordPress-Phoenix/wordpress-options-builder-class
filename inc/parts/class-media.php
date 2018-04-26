<?php

namespace WPOP\V_4_1;

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
		<input id="<?php echo esc_attr( $this->id . '_button' ); ?>" type="button" class="button button-hero img-upload"
			data-media-label="<?php echo esc_attr( $this->media_label ); ?>"
			data-id="<?php echo esc_attr( $this->id ); ?>"
			value="<?php echo esc_attr( $insert_label ); ?>"
			data-button="<?php echo esc_attr( 'Use ' . $this->media_label ); ?>"
			data-title="<?php echo esc_attr( 'Select or Upload ' . $this->media_label ); ?>" />
		<input id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" type="hidden"
		       value="<?php echo esc_attr( $saved['id'] ); ?>"
		       data-part="<?php strtolower( $this->get_clean_classname() ); ?>" />
		<a href="#" class="button img-remove" data-media-label="<?php echo esc_attr( $this->media_label ); ?>">
			<?php echo esc_html( 'Remove ' . $this->media_label ); ?>
		</a>
		<?php
	}

}
