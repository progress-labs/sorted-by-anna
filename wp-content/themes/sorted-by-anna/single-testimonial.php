<?php 


get_header();
?>

<h1>Single Testimonial Page</h1>


<?php while (have_posts()): the_post(); ?>
  <h1><?php the_title(); ?></h1>

  <?php 

    /**
     *
     * Iteratve over each testimonial type
     * Display the :
     *   1. Title 
     *   2. Content 
     *   3. Person's Name
     *   4. Location Info (City, State)
     *   5. Link to Review Service? 
     *
     * At the bottom have a CTA for book a consultation
     */


   ?>
<?php endwhile; ?>
<?php get_footer();?>