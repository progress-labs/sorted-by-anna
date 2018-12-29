<?php
/**
 * Testimonials Slider
 * @var string
 */


?>



<div class="testimonial-slider" data-js-component="postSlider">
    <?php foreach( $slides as $slide ) : ?>
        <div class="testimonial-slider__slide">
            <div class="testimonial-slider__content">
                <?php echo $slide->post_content; ?>

                <span class="testimonial-slider__client">&mdash; <?php echo $slide->post_title; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
