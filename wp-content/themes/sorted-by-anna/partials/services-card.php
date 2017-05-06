<?php

/**
 * Services Card
 */



 $post = $service->post;
?>


<?php if ( $service ) : ?>
<div class="service-card">
    <h2 class="service-card__name"><?php echo $post->post_title; ?></h2>
    <div class="service-card__content">
        <?php echo $post->post_content; ?>
    </div>
</div>
<?php endif; ?>
