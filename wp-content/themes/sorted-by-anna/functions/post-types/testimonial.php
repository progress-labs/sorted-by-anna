<?php

function testimonial_init() {
	register_post_type( 'testimonial', array(
		'labels'            => array(
			'name'                => __( 'Testimonials', 'YOUR-TEXTDOMAIN' ),
			'singular_name'       => __( 'Testimonial', 'YOUR-TEXTDOMAIN' ),
			'all_items'           => __( 'All Testimonials', 'YOUR-TEXTDOMAIN' ),
			'new_item'            => __( 'New Testimonial', 'YOUR-TEXTDOMAIN' ),
			'add_new'             => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'        => __( 'Add New Testimonial', 'YOUR-TEXTDOMAIN' ),
			'edit_item'           => __( 'Edit Testimonial', 'YOUR-TEXTDOMAIN' ),
			'view_item'           => __( 'View Testimonial', 'YOUR-TEXTDOMAIN' ),
			'search_items'        => __( 'Search Testimonials', 'YOUR-TEXTDOMAIN' ),
			'not_found'           => __( 'No Testimonials found', 'YOUR-TEXTDOMAIN' ),
			'not_found_in_trash'  => __( 'No Testimonials found in trash', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'   => __( 'Parent Testimonial', 'YOUR-TEXTDOMAIN' ),
			'menu_name'           => __( 'Testimonials', 'YOUR-TEXTDOMAIN' ),
		),
		'public'            => false,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'thumbnail', 'editor' ),
		'has_archive'       => false,
		'rewrite'           => array( 'with_front' => false ),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-thumbs-up',
		'show_in_rest'      => true,
		'rest_base'         => 'testimonial',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'testimonial_init' );

function testimonial_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['testimonial'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Testimonial updated. <a target="_blank" href="%s">View Testimonial</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'YOUR-TEXTDOMAIN'),
		3 => __('Custom field deleted.', 'YOUR-TEXTDOMAIN'),
		4 => __('Testimonial updated.', 'YOUR-TEXTDOMAIN'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Testimonial restored to revision from %s', 'YOUR-TEXTDOMAIN'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Testimonial published. <a href="%s">View Testimonial</a>', 'YOUR-TEXTDOMAIN'), esc_url( $permalink ) ),
		7 => __('Testimonial saved.', 'YOUR-TEXTDOMAIN'),
		8 => sprintf( __('Testimonial submitted. <a target="_blank" href="%s">Preview Testimonial</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Testimonial</a>', 'YOUR-TEXTDOMAIN'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Testimonial draft updated. <a target="_blank" href="%s">Preview Testimonial</a>', 'YOUR-TEXTDOMAIN'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'testimonial_updated_messages' );
