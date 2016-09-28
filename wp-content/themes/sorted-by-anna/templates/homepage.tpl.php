<?php 

/**
 * Template Name: Home Page Template
 */

$portfolio_args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => '3',
);
$portfolio_query = new WP_Query( $portfolio_args );



$service_args = array(
  'post_type' => 'service',
  'posts_per_page' => '3',
);
$service_query = new WP_Query( $service_args );



$testimonial_args = array(
  'post_type' => 'testimonial',
  'posts_per_page' => '3',
);
$testimonial_query = new WP_Query( $testimonial_args );


get_header();
?>

<?php the_partial('hero', array(
  'title' => 'How can I help you do stuff?',
  'media' => array(
    'img' => get_field('hero', $post->ID)['sizes']['large'],
    'video' => array(
      'src' => get_field('video_file', $post->ID),
      'fallback' => get_field('video_fallback_image', $post->ID)['sizes']['large']
    )
  ),
  'btn' => array(
    'text' => 'Book A Thing',
    'url' => '#'
  )

)); ?>

<div class="feature-section">
  <h1 class="feature-section__title">Services</h1>
  <?php if ( $service_query->have_posts() ) : ?>
  
    <div class="grid grid-3-up">

      <?php while ( $service_query->have_posts() ) : $service_query->the_post(); ?>

        <div class="col">

          <div class="feature-section__card">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>  
            </a>
          </div>
          
        </div>
        
      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
    <!-- Services Page ID -->
    <a href="<?php echo get_page_link(13); ?>">view all</a>
</div>

<div class="feature-section">
  <h1 class="feature-section__title">Testimonials</h1>
  <?php if ( $testimonial_query->have_posts() ) : ?>
  
    <div class="grid grid-3-up">

      <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>

        <div class="col">
        
          <div class="feature-section__card">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>  
            </a>
          </div>
          
        </div>
        
      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
    <!-- Testimonial Page ID -->
    <a href="<?php echo get_page_link(13); ?>">view all</a>
</div>

<div class="feature-section">
  <h1 class="feature-section__title">Portfolio</h1>
  <?php if ( $portfolio_query->have_posts() ) : ?>
  
    <div class="grid grid-3-up">

      <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

        <div class="col">
        
          <div class="feature-section__card">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>  
            </a>
          </div>
          
        </div>
        
      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
    <!-- Portfolio Page ID -->
    <a href="<?php echo get_page_link(13); ?>">view all</a>
</div>

<?php 

get_footer();

?>