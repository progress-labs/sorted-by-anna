<?php

get_header();

$title = 'Press';
?>
<div class="page-container">

  <h2 class="hero__title hero__title--dark"><?php echo $title; ?></h2>

  <?php if ( have_posts() ) : ?>
      <div class="grid grid-3-up">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="col col--no-border">
              <a href="<?php echo get_field( 'article_link' ); ?>" class="press" target="_blank">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail( 'press' ); ?>
                  <?php endif; ?>

                  <div class="press__overlay">
                      <span class="press__article-title">
                          <?php echo get_field( 'article_title' ); ?>
                      </span>
                  </div>

              </a>
          </div>
          <?php endwhile; ?>
      </div>
  <?php endif; ?>
 </div>




<?php get_footer();?>
