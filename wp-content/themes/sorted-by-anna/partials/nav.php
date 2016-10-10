<?php 

/**
 * Nav Component
 */

?>

<div class="nav">
  <div class="nav__wrap">
    <a href="#">logo</a>  
    <?php 
      wp_nav_menu( 
        array( 
          'theme_location' => 'primary-menu'
        ) 
      ); 
    ?>
  </div>
</div>
