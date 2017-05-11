<?php
/**
 * Post Preview
 * @url string
 */
?>

<a href="<?php echo $url; ?>" class="post-preview">
  <div class="post-preview__media-wrap">
      <img class="post-preview__media" src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
  </div>
  <div class="post-preview__body">
      <h3 class="post-preview__title"><?php echo $title; ?></h3>

      <?php if ( $category ) : ?>
            <span><?php echo $category; ?></span>
      <?php endif; ?>

      <?php if ( $excerpt || $content ) : ?>
      <div class="post-preview__content">
          <?php
              if ( $excerpt ) {

                  echo $excerpt;
              } else if ( $content ) {
                  echo wp_trim_words( $content, 40, '...' );
              }
          ?>
      </div>
      <?php endif; ?>

      <?php if ( $read_more ) : ?>
          <span class="post-preview__cta">Read More &rarr;</span>
      <?php endif; ?>
  </div>
</a>
