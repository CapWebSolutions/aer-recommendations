<?php
function aer_get_meta_box_block( $meta_boxes ) {
	$prefix = '_aerb-';

	$meta_boxes[] = array(
		'id' => 'testimonialblock',
		'title' => esc_html__( 'Recommendation', 'abbyeryan' ),
		'description' => 'A custom recommendation block',
		'type' => 'block',
		'icon' => 'awards',
		'category' => 'layout',
		'context' => 'side',
		'priority' => 'high',
		'supports' => array ( 
			'align' => ['wide', 'full'], 
		),
		'fields' => array(
			array(
				'id' => $prefix . 'content',
				'type' => 'textarea',
				'name' => esc_html__( 'Content / Copy', 'abbyeryan' ),
				'desc' => esc_html__( 'Content of testimonial', 'abbyeryan' ),
				'rows' => 4,
				'placeholder' => esc_html__( 'Enter the content for this recommendation. Text only.', 'abbyeryan' ),
			),
			array(
				'id' => $prefix . 'company',
				'type' => 'text',
				'name' => esc_html__( 'Company', 'abbyeryan' ),
				'desc' => esc_html__( 'Company associated with recommendation\'s author', 'abbyeryan' ),
				'size' => 60,
			),
			array(
				'id' => $prefix . 'title',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'abbyeryan' ),
				'desc' => esc_html__( 'Author\'s Title', 'abbyeryan' ),
				'sanitize_callback' => 'aer_sanitize_text_callback',
				'size' => 60,
			),
			array(
				'id' => $prefix . 'authorurl',
				'type' => 'url',
				'name' => esc_html__( 'Author URL', 'abbyeryan' ),
				'desc' => esc_html__( 'Web address associated with recommendation\'s author. (eg. Company, Personal blog, Linkedin)', 'abbyeryan' ),
				'size' => 60,
			),
			array(
				'id' => $prefix . 'testimonialauthorphoto',
				'type' => 'image',
				'name' => esc_html__( 'Image Upload', 'abbyeryan' ),
				'desc' => esc_html__( 'Head shot for recommendation author.', 'abbyeryan' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'aer_get_meta_box_block' );

// function aer_sanitize_text_callback( $value ) {
// 	$value = strip_tags( $value, '<p><a><br><br/>' );
//     return $value;
// }
