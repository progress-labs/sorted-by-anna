<?php

/**
 * Affiliate Card
 */

?>


<?php if ( $affiliate ) : ?>
<a href="<?php echo $url; ?>" class="service-card <?php echo $is_centered ? 'service-card--centered' : ''; echo $is_small ? ' service-card--small' : '';?>" target="_blank" rel=noopener>

    <?php if ( has_post_thumbnail( $affiliate->ID ) ) : ?>
        <img src="<?php the_post_thumbnail_url( '3x4' ); ?>"/>
    <?php endif; ?>

    <h2 class="service-card__name"><?php echo $affiliate->post_title; ?></h2>
    <div class="service-card__content">
        <?php echo $affiliate->post_content; ?>
    </div>
</a>
<?php endif; ?>
