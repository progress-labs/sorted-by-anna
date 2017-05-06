<?php

/**
 * Image Collage
 * @var string
 */

?>

<div class="collage">

      <div class="collage__row collage__row--small-images">
          <?php foreach ($small_images as $key => $value) : ?>
              <div class="collage__image-wrap collage__image-fourth">
                  <img class="collage__image" src="<?php echo $value['sizes']['3x2']; ?>" alt="">
              </div>
          <?php endforeach; ?>
      </div>

      <div class="collage__row">
          <?php foreach ($large_images as $key => $value) : ?>
              <div class="collage__image-wrap collage__image-half">
                  <img class="collage__image" src="<?php echo $value['sizes']['3x2']; ?>" alt="">
              </div>
          <?php endforeach; ?>
      </div>

  </div>
