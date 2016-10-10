<?php 

/**
 * Portfolio Preview
 *
 * Shows one item from the portfolio
 *
 **/



$url = $portfolio->get_permalink();
$title = $portfolio->get_title();
$excerpt = $portfolio->get_excerpt();
$cta = $portfolio->portfolio_preview_cta;

$media = array(
  'src' => 'http://placehold.it/300x300',
  'alt' => 'This is alt text'
);
?>



<a class="portfolio-preview" href="<?php echo $url; ; ?>">

  <div class="portfolio-preview__media">
    <img class="portfolio-preview__img" src="<?php echo $media['src']; ?>" alt="<?php $media['alt']; ?>">
  </div>

  <div class="portfolio-preview__content">
    <h2 class="portfolio-preview__title"><?php echo $title; ?></h2>  
    <?php if ( $excerpt  ) : ?>
      <p><?php echo $excerpt; ?></p>
    <?php endif; ?>

    <?php if ( $cta ) : ?>
      <span class="portfolio-preview__cta"><?php echo $cta ?></span>
    <?php endif; ?>
    
  </div>
  
</a>