<?php
/* ------------------------------------------------------------
 *
 * CUSTOM MENUS
 * 
 * Register any custom menus needed by the theme below.
 * 
 * ------------------------------------------------------------ */
 

function register_priary_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu' ));
}
add_action( 'init', 'register_priary_menu' );