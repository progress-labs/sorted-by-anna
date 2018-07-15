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


// renders an SVG inline
function svg_icon( $icon, $width, $height ) {
  $src = get_stylesheet_directory_uri() . '/assets/img/symbols.svg';
  ?>
  <svg class="icon icon-<?php echo $icon; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $src; ?>#icon-<?php echo $icon; ?>"></use>
  </svg>
  <?php
}
