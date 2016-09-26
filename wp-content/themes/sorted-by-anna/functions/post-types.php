<?php
/* ------------------------------------------------------------
 *
 * POST TYPE REGISTRATION
 * 
 * Register all post types required by the theme below.
 * You can use http://generatewp.com/post-type/ if it makes it 
 * easier for you.
 * 
 * ------------------------------------------------------------ */


add_action( 'init', function () {
    
    /* ------------------------------------------------------------ */
    /** Post Type Name  */
    /* ------------------------------------------------------------ */

    // $labels = [
    //     'name' => __('Plural Name', 'theme_name'),
    //     'singular_name' => __('Singular Name', 'theme_name'),
    //     'add_new' => _x('Add New Singular Name', 'theme_name'),
    //     'add_new_item' => __('Add New Singular Name', 'theme_name'),
    //     'edit_item' => __( 'Edit Singular Name', 'theme_name'),
    //     'new_item' => __('New Singular Name', 'theme_name'),
    //     'view_item' => __('View Singular Name', 'theme_name'),
    //     'search_items' => __('Search Plural Name', 'theme_name'),
    //     'not_found' => __('No Plural Name found', 'theme_name'),
    //     'not_found_in_trash' => __('No Plural Name found in Trash', 'theme_name'),
    //     'parent_item_colon' => __('Parent Singular Name:', 'theme_name'),
    //     'menu_name' => __('Plural Name', 'theme_name'),
    // ];

    // $args = [
    //     'labels' => $labels,
    //     'hierarchical' => false,
    //     'description' => 'description',
    //     'taxonomies' => ['category'],
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_menu' => true,
    //     'show_in_admin_bar' => true,
    //     'menu_position' => null,
    //     'menu_icon' => null,
    //     'show_in_nav_menus' => true,
    //     'publicly_queryable' => true,
    //     'exclude_from_search' => false,
    //     'has_archive' => true,
    //     'query_var' => true,
    //     'can_export' => true,
    //     'rewrite' => true,
    //     'capability_type' => 'post',
    //     'supports' => [
    //         'title', 'editor', 'author', 'thumbnail',
    //         'excerpt','custom-fields', 'trackbacks', 'comments',
    //         'revisions', 'page-attributes', 'post-formats'
    //     ]
    // ];

    // register_post_type('post_type_name', $args);
} );