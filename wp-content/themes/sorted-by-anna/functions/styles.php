<?php
/* ------------------------------------------------------------
 *
 * STYLESHEET ENQUEUEING
 * 
 * Enqueue all stylesheets required by the theme below.
 *  
 * ------------------------------------------------------------ */

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Source+Sans+Pro' );

    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );

} );