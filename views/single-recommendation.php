<?php
/**
 * Testimonial Post Type: Single Post View
 *
 * @package    AbbyERyan.com Testimonials
 * @author     Cap Web Solutions
 * @copyright  2020 Matt Ryan 
 *
 */

function aer_recommendation_info() {

	global $post;
	$prefix = '_aer-';
	$post_id = get_the_ID( $post->ID ); 

	$recommendation_entry = '';

	$recommendation_images = rwmb_meta( $prefix . 'recommendation_author_photo', array( 'limit' => 1 ) );
	$recommendation_image = reset( $recommendation_images );

	$recommendation_author = get_the_title( $post_id );
	$recommendation_content = get_post_meta( $post_id, $prefix . 'content', true );
	$recommendation_company = get_post_meta( $post_id, $prefix . 'company', true );
	$recommendation_title = get_post_meta( $post_id, $prefix . 'title', true );
	$recommendation_url = get_post_meta( $post_id, $prefix . 'author_url', true );
	$recommendation_class = strip_tags( get_the_term_list( get_the_ID(), 'classification', '', ', ', '' ) );

	If ( $recommendation_image['url'] ) $recommendation_entry .= sprintf('<span class="alignleft recommendation-image"><img src="%s"></span>', $recommendation_image['url'] );

	$recommendation_entry .= sprintf('<p class="recommendation-content">%s</p><div class="recommendation-author">%s</div>', $recommendation_content, $recommendation_author );

	if( !empty( $recommendation_class ) ) { 
		$recommendation_entry .= sprintf('<div class="recommendation-tax">%s</div>', $recommendation_class ); 
	}
	
	if( !empty( $recommendation_company ) ) { 
		$recommendation_entry .= sprintf('<div>Company: %s</div>', $recommendation_company ); 
	}	
	if( !empty( $recommendation_title ) ) { 
		$recommendation_entry .= sprintf('<div>%s</div>', $recommendation_title ); 
	}
	if( !empty( $recommendation_url ) ) { 
		$recommendation_entry .= sprintf('<a href="%s" rel=nofollow target=_blank>Link</a>', $recommendation_url ); 
	}

	printf( '<article class="recommendation-entry">%s</article>', $recommendation_entry  );

}
