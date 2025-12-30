<?php
function aer_register_recommendation() {
	
	$args = array (
		'label' => esc_html__( 'Recommendations', 'abbyeryan' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Recommendations', 'abbyeryan' ),
			'name_admin_bar' => esc_html__( 'Recommendation', 'abbyeryan' ),
			'add_new' => esc_html__( 'Add new', 'abbyeryan' ),
			'add_new_item' => esc_html__( 'Add new Recommendation', 'abbyeryan' ),
			'new_item' => esc_html__( 'New Recommendation', 'abbyeryan' ),
			'edit_item' => esc_html__( 'Edit Recommendation', 'abbyeryan' ),
			'view_item' => esc_html__( 'View Recommendation', 'abbyeryan' ),
			'update_item' => esc_html__( 'Update Recommendation', 'abbyeryan' ),
			'all_items' => esc_html__( 'All Recommendations', 'abbyeryan' ),
			'search_items' => esc_html__( 'Search Recommendations', 'abbyeryan' ),
			'parent_item_colon' => esc_html__( 'Parent Recommendation', 'abbyeryan' ),
			'not_found' => esc_html__( 'No Recommendations found', 'abbyeryan' ),
			'not_found_in_trash' => esc_html__( 'No Recommendations found in Trash', 'abbyeryan' ),
			'name' => esc_html__( 'Recommendations', 'abbyeryan' ),
			'singular_name' => esc_html__( 'Recommendation', 'abbyeryan' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-megaphone',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => 'recommendations',
		'query_var' => true,
		'can_export' => true,
		'description' => 'Recommendations for Abby E Ryan',
		'menu_position' => 5,
		'supports' => array(
			'title',
			'thumbnail',
			'excerpt',
		),
);
	register_post_type( 'recommendation', $args );
}
	
add_action( 'init', 'aer_register_recommendation' );
	
	
function aer_recommendation_title( $input ) {

	global $post_type;

	if( is_admin() && 'Add title' == $input && 'recommendation' == $post_type )
		return 'Recommendation Author\'s Name';
	return $input;
}
add_filter('gettext','aer_recommendation_title');