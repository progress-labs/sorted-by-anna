<?php

function service_init() {
	register_post_type( 'service', array(
		'labels'            => array(
			'name'                => __( 'Services', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'Service', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All Services', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New Service', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New Service', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Service', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Service', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Services', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No Services found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No Services found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent Service', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'Services', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'service',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'service_init' );

function service_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['service'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Service updated. <a target="_blank" href="%s">View Service</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Service updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Service restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Service published. <a href="%s">View Service</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Service saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Service submitted. <a target="_blank" href="%s">Preview Service</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Service scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Service</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Service draft updated. <a target="_blank" href="%s">Preview Service</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'service_updated_messages' );
