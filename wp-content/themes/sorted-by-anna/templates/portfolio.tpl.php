<?php 

/**
 * Template Name: Portfolio Page Template
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

$args = array(
  'post_type' => 'portfolio'
);

$the_query = new WP_Query( $args );


get_header();
?>

<main>
  <div class="page-container">
    

    <?php the_partial( 'page-hero', array(
    'title' => get_the_title() 
    )); ?>

    <?php if ( $the_query->have_posts() ) : ?>
      <div class="content-wrap">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $portfolio = new Portfolio_View_Model( $post );?>
            
            <?php the_partial( 'portfolio-preview', array(
              'portfolio' => $portfolio
            )); ?>
          
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
      </div>
      
    <?php endif; ?>

    <?php the_partial( 'consultation-cta' ); ?>
  </div>


 
</main>








<?php 

get_footer();

?>