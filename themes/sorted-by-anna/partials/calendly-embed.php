<?php
/**
 * Calendly Embed
 */
?>

<div class="page-section">
    <div class="backdrop">
        <div class="page-container calendly">
            <?php the_partial( 'section-title', [
                'title' => 'Book A Free Consultation Now'
            ]); ?>
          <iframe src="<?php echo get_field('calendly_url', 'option'); ?>" style="width:100%; height:500px;" frameBorder="0" scrolling="yes"></iframe>
        </div>
    </div>

</div>
