<?php 

/**
 * Post Slider
 */


?>


<?php if ( !empty( $slides ) ) : ?>
  <section class="feature-section">
    <h2 class="feature-section__title"><?php echo $title; ?></h2>
    
    <div class="post-slider" data-js-component="postSlider">
      <?php foreach ($slides as $slide) : ?>
        <div class="post-slider__slide">

          <blockquote class="post-slider__quote">
            
            <?php echo get_field( 'testimonial_text', $slide->ID ); ?>
            <cite class="post-slider__cite">
              <span class="post-slider__quote-icon"></span>
              <?php echo get_field( 'client_name', $slide->ID ); ?>

              <span class="post-slider__quote-date">
                <?php echo date( 'F jS, Y', strtotime( get_field( 'testimonial_date', $slide->ID ) ) );?>
              </span>

            </cite>
          </blockquote>
        </div>
        
      <?php endforeach; ?>
    </div>
  </section>

<?php endif; ?>