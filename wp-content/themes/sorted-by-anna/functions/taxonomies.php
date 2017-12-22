<?php

function services_init() {
	register_taxonomy( 'services', array( 'project' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Services', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Services', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search services', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular services', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All services', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent services', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent services:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit services', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update services', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'New services', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New services', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Services separated by comma', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove services', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used services', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No services found.', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Services', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'services',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'services_init' );
