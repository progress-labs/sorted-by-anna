<?php

/**
 * Services Card
 */


if ( !isset( $is_centered ) ) $is_centered = false;
if ( !isset( $is_small ) ) $is_small = false;

?>

<div class="service-card <?php echo $is_centered ? 'service-card--centered' : ''; echo $is_small ? ' service-card--small' : '';?>">

    <?php if ( $image ) : ?>
        <img src="http://placehold.it/400x300" alt="">
    <?php endif; ?>

    <h2 class="service-card__name"><?php echo $title; ?></h2>
    <div class="service-card__content">
        <?php echo $description; ?>
    </div>
</div>
