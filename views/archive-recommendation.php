<?php
/**
 * Recommendation Post Type: Archive/Taxonomy View
 *
 * @package    AbbyERyan.com Recommendations
 * @author     Cap Web Solutions
 * @copyright  2020 Matt Ryan
 *
 */

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );


add_action( 'genesis_entry_header', 'aer_archive_recommendation_info', 10 );
function aer_archive_recommendation_info() {

	global $post;
	$prefix = '_aer-';
	$post_id = get_the_ID( $post->ID ); 
	$recommendation_entry = '';

	$recommendation_person = get_the_title( $post_id );

	$recommendation_person_url = sprintf('<a href="%s">%s</a>', get_the_permalink( $post_id, false ), the_title( '', '', false  ) );

	$recommendation_content = get_the_excerpt( $post_id );
	if ( empty( $recommendation_content ) ) $recommendation_content = get_post_meta( $post_id, $prefix . 'content', true );

	$recommendation_company = get_post_meta( $post_id, $prefix . 'company', true );
	$recommendation_title = get_post_meta( $post_id, $prefix . 'title', true );
	$recommendation_class = strip_tags( get_the_term_list( get_the_ID(), 'classification', '', ', ', '' ) );


	// if( !empty( $recommendation_class ) ) { 
	// 	$recommendation_entry .= sprintf('<div class="recommendation-tax">%s</span>', $recommendation_class ); 
	// }	
	// $recommendation_entry .= sprintf('<p class="recommendation-content">%s</p>', $recommendation_content );
	$recommendation_entry .= sprintf('<div class="notepaper"><figure class="quote"><blockquote class="curly-quotes">%s</blockquote><figcaption class="quote-by">&mdash; %s<br>%s<br>%s client<figcaption></figure></div>', $recommendation_content, $recommendation_person_url, $recommendation_title, $recommendation_class );

	// if( !empty( $recommendation_featured_img ) ) { 
	// 	$recommendation_entry .= sprintf('<span class="alignright recommendation-image">%s</span>', $recommendation_featured_img ); 
	// }

	// if( !empty( $recommendation_company ) ) { 
	// 	$recommendation_entry .= sprintf('<div>Company: %s</div>', $recommendation_company ); 
	// }	
	// if( !empty( $recommendation_title ) ) { 
	// 	$recommendation_entry .= sprintf('<div>%s</div>', $recommendation_title ); 
	// }

	printf( '<article class="recommendation-entry">%s</article>', $recommendation_entry  );

}

genesis();