<?php

  $hero_img     = $media['img'];
  $btn_text     = $btn['text'];
  $url          = $btn['url'];
  $video        = $media['video']['src']['url'];
  $fallback_img = $media['video']['fallback'];

  $hasVideo     = !empty( $video );

?>

<div class="hero <?php echo $hasVideo ? 'hero--overlay': ''; ?>">

  <div class="hero__media <?php echo $hasVideo ? 'responsive-embed' : ''; ?>">

    <?php if ( $hasVideo ) : ?>

        <div class="responsive-embed">
          <video class="hero__video" id="movie" poster="<?php echo $fallback_img; ?>" preload="auto" autoplay="autoplay" loop="on" muted="">
              <source src="<?php echo $video; ?>" type="video/mp4">
          </video>
        </div>

    <?php else : ?>

        <div class="hero__image-wrap">
          <img class="hero__image" src="<?php echo $image; ?>" alt="">
        </div>

    <?php endif; ?>

    <?php if ( $title ) : ?>
      <h1 class="hero__title"><?php echo $title; ?></h1>
    <?php endif; ?>

  </div>

</div>
