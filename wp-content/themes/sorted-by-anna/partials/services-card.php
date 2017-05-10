<?php

/**
 * Services Card
 */



?>


<?php if ( $service ) : ?>
<div class="service-card">
    <h2 class="service-card__name"><?php echo $service->post_title; ?></h2>
    <div class="service-card__content">
        <?php echo $service->post_content; ?>
    </div>
</div>
<?php endif; ?>
