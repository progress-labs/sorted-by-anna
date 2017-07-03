<?php

/**
 * Nav Component
 */

?>

<div class="nav" data-js-component="nav">
    <div class="hide-at-small">
        <div class="nav-menu__trigger">
            <div class="nav-menu">
                <span class="nav-menu__bar"></span>
                <span class="nav-menu__bar"></span>
                <span class="nav-menu__bar"></span>
            </div>
        </div>
    </div>

    
    <div class="show-at-small nav-utility">
        <div class="logo">
            Logo
        </div>
    </div>
    <div class="nav-wrap">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary-menu'
            )
          );
        ?>
    </div>

    <div class="show-at-small nav-utility">
        <a class="btn btn--ghost btn--sm" href="#">Book Now</a>
    </div>

</div>
