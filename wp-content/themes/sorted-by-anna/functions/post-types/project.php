<?php

function project_init() {
	register_post_type( 'project', array(
		'labels'            => array(
			'name'                => __( 'Project', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'Project', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All Project Items', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New Project Items', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New Project Item', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Project Item', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Project Item', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Project Items', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No Project Items found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No Project Items found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent Project', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'Project', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => true,
        'rewrite'           => array(
                                'slug' => 'projects',
                                'with_front' => false
                            ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-list-view',
		'show_in_rest'      => true,
		'rest_base'         => 'project',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'project_init' );

function project_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Project updated. <a target="_blank" href="%s">View Project</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Project updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View Project</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Project saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview Project</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview Project</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'project_updated_messages' );
