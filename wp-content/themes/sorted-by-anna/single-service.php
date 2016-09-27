<?php 


get_header();
?>

<h1>Single Service Page</h1>


<?php while (have_posts()): the_post(); ?>
  <?php while (have_posts()): the_post(); ?>
    <h1><?php the_title(); ?></h1>

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