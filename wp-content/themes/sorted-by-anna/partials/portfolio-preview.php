<?php 

/**
 * Portfolio Preview
 *
 * Shows one item from the portfolio
 *
 **/
?>

<a class="portfolio-preview <?php echo $portfolio->featured_image() ? '' : 'no-image'; ?>" href="<?php echo $portfolio->get_permalink(); ?>">
  

  <?php if ( $portfolio->featured_image() ) : ?>
    <div class="portfolio-preview__media">
      <img class="portfolio-preview__img" src="<?php echo $portfolio->featured_image()['image']; ?>" alt="<?php echo $portfolio->get_title(); ?>">
    </div>
  <?php endif; ?>
  

  <div class="portfolio-preview__content">
    <h2 class="portfolio-preview__title"><?php echo $portfolio->get_title();; ?></h2>  
    <?php if ( $portfolio->get_excerpt()  ) : ?>
      <p><?php echo $portfolio->get_excerpt(); ?></p>
    <?php endif; ?>

    <?php if ( $portfolio->portfolio_preview_cta ) : ?>
      <span class="portfolio-preview__cta"><?php echo $portfolio->portfolio_preview_cta; ?> &rarr;</span>
    <?php endif; ?>
    
  </div>
  
</a>