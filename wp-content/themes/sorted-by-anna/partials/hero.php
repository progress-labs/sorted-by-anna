<?php

  $hero_img     = $media['img'];
  $btn_text     = $btn['text'];
  $url          = $btn['url'];
  $video        = $media['video']['src']['url'];
  $fallback_img = $media['video']['fallback'];

  $hasVideo     = !empty($video);

?>

<div class="hero <?php echo $hasVideo ? 'hero--overlay': ''; ?>">

  <div class="hero__media responsive-embed">

    <?php if ( $hasVideo ) : ?>

        <video id="movie" poster="<?php echo $fallback_img; ?>" preload="auto" autoplay="autoplay" loop="on" muted="">
            <source src="<?php echo $video; ?>" type="video/mp4">
        </video>

    <?php else : ?>

        <img src="<?php echo $hero_img; ?>" alt="">

    <?php endif; ?>

  </div>

</div>
