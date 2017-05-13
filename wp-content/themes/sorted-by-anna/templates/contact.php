<?php

/**
 * Template Name: Contact Page Template
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

global $post;

$args = array(
  'post_type' => 'service'
);

$the_query = new WP_Query( $args );


get_header();
?>

<main>
  <div class="page-container">

    <?php the_partial( 'page-hero', array(
    'title' => get_the_title()
    )); ?>

    <div class="content-wrap">
        <h3>Need Help?</h3>
        <p>Don't hesitate to contact me directly at <a href="mailto:anna@sortedbyanna.com">anna@sortedbyanna.com</a></p>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <div class="page-content">

          <?php the_content(); ?>

        </div>

      <?php endwhile; ?>
    <?php endif; ?>



    </div>
  </div>





</main>








<?php

get_footer();

?>
