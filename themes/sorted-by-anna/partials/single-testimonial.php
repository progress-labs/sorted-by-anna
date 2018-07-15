<?php

/**
 * Single Testimonial
 */

?>
<?php if ( $testimonial ) : ?>

    <div class="single-testimonial">
        <div class="single-testimonial__slide">
            <div class="single-testimonial__content">
                <?php echo $testimonial->post_content; ?>
                <span class="single-testimonial__client">&mdash; <?php echo $testimonial->post_title; ?></span>
            </div>
        </div>

    </div>

<?php endif; ?>
