<?php
  $video        = $media['video'] ? $media['video']: false ;
?>

<div class="hero <?php echo $video ? 'hero--overlay': ''; ?>">

  <div class="hero__media <?php echo $video ? 'responsive-embed' : ''; ?>">

    <?php if ( $video ) : ?>

        <div class="responsive-embed">
          <video class="hero__video" id="movie" poster="<?php echo $fallback_img; ?>" preload="auto" autoplay="autoplay" loop="on" muted="">
              <source src="<?php echo get_template_directory_uri() . '/assets/video/sba-intro.m4v'; ?>" type="video/mp4">
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
