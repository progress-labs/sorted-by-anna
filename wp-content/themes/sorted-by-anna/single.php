<?php 
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );

get_header();

$post_args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_posts = new WP_Query( $post_args );

?>
<div class="page-container">

<?php if ( have_posts() ) : ?>
  <article class="article">
      
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="post-header">
          <?php the_date('F j, Y', '<h2>', '</h2>'); ?>
          author: <?php the_author(); ?> 
        </div>

        <?php the_title(); ?>
        <?php the_content(); ?>

      <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
    
  </article>

<?php endif; ?>

<?php if ( $related_posts->have_posts() ) : ?>

  <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>  
    </a>
    
  <?php endwhile; wp_reset_postdata(); ?>

<?php endif; ?>


  


</div>

<?php get_footer(); ?>