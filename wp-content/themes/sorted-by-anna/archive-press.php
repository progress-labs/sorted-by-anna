<?php

get_header();

$title = 'Press';
$page_content = get_field( 'press_content', 'option');
?>

<?php the_partial('page-hero', [
    'title' => $title
]); ?>

<?php if ( $page_content ) : ?>
    <section class="page-section page-content">
        <?php echo $page_content; ?>
    </section>
<?php endif; ?>

<div class="page-container">
  <?php if ( have_posts() ) : ?>
      <div class="grid grid-4-up">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="col">
              <a href="<?php echo get_field( 'article_link' ); ?>" class="press" target="_blank">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail( 'press' ); ?>
                  <?php endif; ?>

                  <div class="press__overlay">
                      <h3 class="press__article-title">
                          <?php echo get_field( 'article_title' ); ?>
                      </h3>
                  </div>

              </a>
          </div>
          <?php endwhile; ?>
      </div>
  <?php endif; ?>
 </div>




<?php get_footer();?>
