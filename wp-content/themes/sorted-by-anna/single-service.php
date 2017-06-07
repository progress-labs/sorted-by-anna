<?php
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

get_header();


$services = array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'orderby' => 'rand'
);
$services_query = new WP_Query( $serivce );

$serivce_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_services = new WP_Query( $serivce_args );

the_partial('nav');

the_partial('page-hero');

?>

<?php while (have_posts()): the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>

    <?php

      /**
       *
       * Iteratve over each Service type
       * Display the :
       *   1. Title
       *   2. Content
       *   3. Service Types
       *
       * At the bottom have a CTA for book a consultation
       */


     ?>
  <?php endwhile; ?>


<?php get_footer();?>
