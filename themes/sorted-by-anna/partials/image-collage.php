<?php

/**
 * Image Collage
 * @var string
 */

?>

<div class="page-container">
<div class="collage">
      <div class="collage__row">
          <?php foreach ($large_images as $key => $value) : ?>
              <div class="collage__image-wrap collage__image-half" style="background-image: url(<?php echo $value['sizes']['3x2']; ?>);">
              </div>
          <?php endforeach; ?>
      </div>

  </div>
</div>

