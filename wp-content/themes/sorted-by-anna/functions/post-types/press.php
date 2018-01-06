<?php

function press_init() {
	register_post_type( 'press', array(
		'labels'            => array(
			'name'                => __( 'Press', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'Press', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All Press', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New Press', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New Press', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Press', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Press', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Press', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No Press found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No Press found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent Press', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'Press', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => true,
        'exclude_from_search' => false,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => array( 'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'press',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'press_init' );

function press_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['press'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Press updated. <a target="_blank" href="%s">View Press</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Press updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Press restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Press published. <a href="%s">View Press</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Press saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Press submitted. <a target="_blank" href="%s">Preview Press</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Press scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Press</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Press draft updated. <a target="_blank" href="%s">Preview Press</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'press_updated_messages' );
