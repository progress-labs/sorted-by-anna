<?php

/**
 * Image Collage
 * @var string
 */

?>

<div class="page-container">
    <div class="collage">
        <div class="collage__row" data-js-component="imageGrid">
            <?php foreach ($large_images as $key => $value) : ?>
                <a href="<?php echo $value['image_lg']; ?>" class="collage__image-wrap collage__image-half" style="background-image: url(<?php echo $value['3x2']; ?>);"></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
