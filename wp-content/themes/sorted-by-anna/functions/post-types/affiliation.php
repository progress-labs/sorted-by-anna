<?php

function affiliation_init() {
	register_post_type( 'affiliation', array(
		'labels'            => array(
			'name'                => __( 'Affiliations', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'Affiliation', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All Affiliations', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New Affiliation', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New Affiliation', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Affiliation', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Affiliation', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Affiliations', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No Affiliations found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No Affiliations found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent Affiliation', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'Affiliations', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => array( 'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'affiliation',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'affiliation_init' );

function affiliation_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['affiliation'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Affiliation updated. <a target="_blank" href="%s">View Affiliation</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Affiliation updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Affiliation restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Affiliation published. <a href="%s">View Affiliation</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Affiliation saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Affiliation submitted. <a target="_blank" href="%s">Preview Affiliation</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Affiliation scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Affiliation</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Affiliation draft updated. <a target="_blank" href="%s">Preview Affiliation</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'affiliation_updated_messages' );
