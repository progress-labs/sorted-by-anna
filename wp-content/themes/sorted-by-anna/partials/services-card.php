<?php

/**
 * Services Card
 */


if ( !isset( $is_centered ) ) $is_centered = false;
if ( !isset( $is_small ) ) $is_small = false;

?>


<?php if ( $service ) : ?>
<div class="service-card <?php echo $is_centered ? 'service-card--centered' : ''; echo $is_small ? ' service-card--small' : '';?>">

    <img src="http://placehold.it/400x300" alt="">

    <h2 class="service-card__name"><?php echo $service->post_title; ?></h2>
    <div class="service-card__content">
        <?php echo $service->post_content; ?>
    </div>
</div>
<?php endif; ?>
