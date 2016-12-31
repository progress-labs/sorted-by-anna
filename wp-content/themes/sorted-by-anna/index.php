<?php
/**
 * Base index file for the template
 */
get_header(); ?>

<?php

the_post(); ?>

<main>
  <div class="page-container">
    <?php the_partial( 'page-hero', array(
    'title' => get_the_title() ) ); ?>
    
    <div class="content-wrap">
      <div class="page-content">
        
        <?php the_content(); ?>
        
      </div>
    </div>
    
  </div>
</main>

<?php 
get_footer(); ?>