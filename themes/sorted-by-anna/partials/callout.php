<?php
/**
* Callout
*/
?>

<div class="callout">
    <h2 class="callout__cta"><?php echo $text; ?></h2>

    <?php if ( $btn && $btn['url'] ) : ?>
        <a class="btn btn--centered" href="<?php echo $btn['url']; ?>"><?php echo $btn['text']; ?></a>
    <?php endif; ?>
</div>
