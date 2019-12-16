<?php
/* ------------------------------------------------------------
 *
 * JAVASCRIPT ENQUEUEING
 * 
 * Enqueue all Javascript files required by the theme below.
 * 
 * ------------------------------------------------------------ */

add_action( 'wp_enqueue_scripts', function() {

    /*-------------------------------------------- */
    /** Deregistration */
    /*-------------------------------------------- */



    /*-------------------------------------------- */
    /** Head Scripts */
    /*-------------------------------------------- */



    /*-------------------------------------------- */
    /** Footer Scripts */
    /*-------------------------------------------- */

    $scripts_env = [
      'production' => [
          'vendor'    =>  get_template_directory_uri() . '/assets/js/dist/vendor.bundle.js',
          'main'      => get_template_directory_uri() . '/assets/js/dist/main.bundle.js'
      ],

      'dev' => [
          'vendor'    => get_template_directory_uri() . '/assets/js/built/vendor.bundle.js',
          'main'      => get_template_directory_uri() . '/assets/js/built/main.bundle.js',
      ]
    ];

    // map local env to dev
    $scripts_env['local'] = $scripts_env['dev'];

    // get our environment. If it isn't defined, default to production
    $env = defined( 'ENV' ) ? ENV : 'production';
    // enqueue our scripts
    foreach ( $scripts_env[$env] as $handle => $script ) {
        wp_enqueue_script( $handle, $script, [], false, true );
    }
} );