<?php 
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

global $post;

get_header();

$portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_portfolios = new WP_Query( $portfolio_args );
?>

<?php while (have_posts()): the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
  
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

<?php while ( $related_portfolios->have_posts() ): $related_portfolios->the_post(); $related_portfolio = new Portfolio_View_Model( $post );?>
    <h3><?php echo $related_portfolio->get_title(); ?></h3>
    

<?php endwhile; ?>
<?php get_footer();?>