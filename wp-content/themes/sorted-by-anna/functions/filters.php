<?php 
  
/**
 * Filters
 */


function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('excerpt_more', function() {
  return '...';
});