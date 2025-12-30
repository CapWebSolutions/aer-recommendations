<?php
function aer_get_meta_box( $meta_boxes ) {
	$prefix = '_aer-';

	$meta_boxes[] = array(
		'id' => 'recommendation',
		'title' => esc_html__( 'Recommendation Details', 'abbyeryan' ),
		'post_types' => array('recommendation' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'content',
				'type' => 'textarea',
				'name' => esc_html__( 'Content / Copy', 'abbyeryan' ),
				'desc' => esc_html__( 'Content of recommendation', 'abbyeryan' ),
				'rows' => 4,
				'placeholder' => esc_html__( 'Enter the content for the recommendation. Text only.', 'abbyeryan' ),
				'sanitize_callback' => 'aer_sanitize_text_callback',
			),
			array(
				'id' => $prefix . 'company',
				'type' => 'text',
				'name' => esc_html__( 'Company', 'abbyeryan' ),
				'desc' => esc_html__( 'Company associated with recommendation author (if applicable)', 'abbyeryan' ),
				'sanitize_callback' => 'aer_sanitize_text_callback',
				'size' => 60,
			),
			array(
				'id' => $prefix . 'title',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'abbyeryan' ),
				'desc' => esc_html__( 'Author\'s Title (if applicable)', 'abbyeryan' ),
				'sanitize_callback' => 'aer_sanitize_text_callback',
				'size' => 60,
			),
			array(
				'id' => $prefix . 'author_url',
				'type' => 'url',
				'name' => esc_html__( 'Author URL', 'abbyeryan' ),
				'desc' => esc_html__( 'Web address associated with recommendation author. (eg. Company, Personal blog, Linkedin)', 'abbyeryan' ),
				'size' => 60,
			),
			array(
				'id' => $prefix . 'recommendation_author_photo',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Upload', 'abbyeryan' ),
				'desc' => esc_html__( 'Photo of Recommendation Author.', 'abbyeryan' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'aer_get_meta_box' );

function aer_sanitize_text_callback( $value ) {
	$value = strip_tags( $value, '<p><a><br><br/>' );
    return $value;
}
// add_filter( 'rwmb_media_add_string', 'aer_change_add_string' );
// function aer_change_add_string() {
//     return '+ Profile Photo';
// }