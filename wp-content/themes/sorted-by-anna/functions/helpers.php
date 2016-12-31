<?php
/* ------------------------------------------------------------
 *
 * CUSTOM HELPER FUNCTIONS
 *
 * Define any custom helper functions needed in the theme below.
 * 
 * ------------------------------------------------------------ */
 
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Site Settings',
    'menu_title'  => 'Site Settings',
    'menu_slug'   => 'site-settings',
  ));
  
}



  function num_per_row( $count ){
      if ($count % 4 == 0) {
          $items_per_row = 4;
          return 4;
      }

      if ($count % 3 == 0 || $count % 4 == 1) {
          $items_per_row = 3;
          return 3;
      }

      $items_per_row = 4;
      return 4;
  }