<?php 

/**
 * Template Name: Portfolio Page Template
 */

$args = array(
  'post_type' => 'portfolio'
);

$the_query = new WP_Query( $args );


get_header();
?>

<h1><?php echo get_the_title(); ?></h1>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>">
      <h2><?php the_title(); ?></h2>  

    </a>
    
  <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>







<?php 

get_footer();

?>