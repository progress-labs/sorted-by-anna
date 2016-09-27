<?php 


get_header();
?>

<h1>Single Portfolio Page</h1>

<?php while (have_posts()): the_post(); ?>
  <h1><?php the_title(); ?></h1>

  <?php 

    /**
     *
     * Iteratve over each portfolio type
     * Display the :
     *   1. Title 
     *   2. Content 
     *   3. Image
     *   4. Add CTA to portfolio item 
     *
     * At the bottom have a CTA for book a consultation
     */


   ?>
<?php endwhile; ?>
<?php get_footer();?>