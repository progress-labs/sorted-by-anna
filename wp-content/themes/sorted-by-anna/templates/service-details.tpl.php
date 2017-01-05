<?php 

/**
 * Template Name: Service Details
 */

$service_objects = get_field( 'services' );
$portfolio_objects = get_field( 'portfolio_items' );
$testimonial_objects = get_field( 'testimonials_slider' );

get_header();

the_partial('nav');
?>

<div class="page-container">
  <?php the_partial( 'page-hero', array(
    'title' => get_the_title() 
  )); ?>

  <div class="content-wrap">
    <div class="page-content">

      <?php the_partial('callout', [
        'text' => get_field('callout')
      ]) ?>

      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          
          <div class="grid">
            <div class="two-third main-content">
              <?php the_content(); ?>

              <?php the_partial('image-cluster'); ?>
            </div>

            <aside class="content-aside one-third has-left-border">

              <?php the_partial('how-to-list', [
                'title' => 'How It Works',
                'list'  => get_field('how_to_steps')
              ]) ?>
            </aside>
            
          </div>

        <?php endwhile; ?> 
      <?php endif; ?>

      <?php the_partial('calendly-embed'); ?>

      <?php if ( $testimonial_objects ) {
        the_partial('post-slider', [
          'title'         => 'Testimonials', 
          'slides' => $testimonial_objects
        ]);
      }?>

      <?php the_partial('bio'); ?>
    </div>
  </div>


  
  

</div>

<?php 

get_footer();

?>