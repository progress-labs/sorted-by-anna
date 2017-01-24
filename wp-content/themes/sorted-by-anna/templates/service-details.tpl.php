<?php 

/**
 * Template Name: Service Details
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

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

              <?php the_partial('image-cluster') ?>
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
      
      <h2 class="services-grid__title">Services Include:</h2>
      <div class="services-grid">


        <?php foreach ($service_objects as $object) :  ?>
          <div class="services-grid__col">

            <div class="services-card">

                <?php if ( get_field('gallery_images', $object->ID) ) : 
                  $img = get_field('gallery_images', $object->ID)[0]['image']['sizes']['medium'];
                ?>
                  <div class="services-card__wrap">
                    <img src="<?php echo $img; ?>" alt="">                  
                  </div>

                <?php elseif ( has_post_thumbnail( $object->ID ) ) : ?>
                  
                  <div class="services-card__wrap">
                    <?php echo get_the_post_thumbnail( $object->ID, 'medium' ); ?>
                  </div>

                <?php endif; ?>

                <h2 class="services-card__title"><?php echo get_the_title( $object->ID ); ?></h2>
                <p><?php echo get_the_content( $object->ID ); ?></p>

            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <?php if( get_field('display_calendar') ) : ?>
        
        <?php the_partial('calendly-embed'); ?>

      <?php endif; ?>

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