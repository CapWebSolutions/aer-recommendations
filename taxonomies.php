<?php
function aer_recommendations_register_taxonomy() {

		$args = array (
			'label' => esc_html__( 'Classification', 'abbyeryan' ),
			'labels' => array(
				'menu_name' => esc_html__( 'Classification', 'abbyeryan' ),
				'all_items' => esc_html__( 'All classifications', 'abbyeryan' ),
				'edit_item' => esc_html__( 'Edit Classification', 'abbyeryan' ),
				'view_item' => esc_html__( 'View Classification', 'abbyeryan' ),
				'update_item' => esc_html__( 'Update Classification', 'abbyeryan' ),
				'add_new_item' => esc_html__( 'Add new Classification', 'abbyeryan' ),
				'new_item_name' => esc_html__( 'New Classification', 'abbyeryan' ),
				'parent_item' => esc_html__( 'Parent Classification', 'abbyeryan' ),
				'parent_item_colon' => esc_html__( 'Parent Classification:', 'abbyeryan' ),
				'search_items' => esc_html__( 'Search classifications', 'abbyeryan' ),
				'popular_items' => esc_html__( 'Popular classifications', 'abbyeryan' ),
				'separate_items_with_commas' => esc_html__( 'Separate classifications with commas', 'abbyeryan' ),
				'add_or_remove_items' => esc_html__( 'Add or remove classifications', 'abbyeryan' ),
				'choose_from_most_used' => esc_html__( 'Choose most used classifications', 'abbyeryan' ),
				'not_found' => esc_html__( 'No classifications found', 'abbyeryan' ),
				'name' => esc_html__( 'Classification', 'abbyeryan' ),
				'singular_name' => esc_html__( 'Classification', 'abbyeryan' ),
			),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_quick_edit' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'hierarchical' => false,
			'query_var' => true,
			'sort' => false,
			'rewrite_no_front' => false,
			'rewrite_hierarchical' => false,
			'rewrite' => true,
		);
	
		register_taxonomy( 'classification', array( 'recommendation' ), $args );
	}
add_action( 'init', 'aer_recommendations_register_taxonomy', 0 );