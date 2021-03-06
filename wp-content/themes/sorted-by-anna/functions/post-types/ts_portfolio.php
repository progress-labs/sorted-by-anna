<?php

function ts_portfolio_init() {
	register_post_type( 'ts_portfolio', array(
		'labels'            => array(
			'name'                => __( 'TS Portfolio', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'TS Portfolio', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All TS Portfolio Items', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New TS Portfolio Items', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New TS Portfolio Item', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit TS Portfolio Item', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View TS Portfolio Item', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search TS Portfolio Items', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No TS Portfolio Items found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No TS Portfolio Items found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent TS Portfolio', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'TS Portfolio', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-list-view',
		'show_in_rest'      => true,
		'rest_base'         => 'portfolio',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'ts_portfolio_init' );

function ts_portfolio_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['portfolio'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Portfolio updated. <a target="_blank" href="%s">View Portfolio</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Portfolio updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Portfolio restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Portfolio published. <a href="%s">View Portfolio</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Portfolio saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Portfolio submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Portfolio draft updated. <a target="_blank" href="%s">Preview Portfolio</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'ts_portfolio_updated_messages' );
