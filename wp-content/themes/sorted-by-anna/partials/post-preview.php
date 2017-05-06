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
      <div class="post-preview__content">
          <?php
              if ( $excerpt ) {

                  echo $excerpt;
              } else {
                  echo wp_trim_words( $content, 40, '...' );
              }
          ?>
      </div>

      <span class="post-preview__cta">Read More &rarr;</span>
  </div>
</a>
