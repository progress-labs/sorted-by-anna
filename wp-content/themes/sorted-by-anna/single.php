<?php
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );

get_header();

$post_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_posts = new WP_Query( $post_args );

the_partial('nav', [
    'is_solid' => true
]);
?>
<div class="page-container">

<?php if ( have_posts() ) : ?>

        <article class="article">

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="post__header">
                    <h1 class="post__title"><?php the_title(); ?></h1>

                    <div class="post__meta">
                        <h4 class="post__date"><?php the_date('F j, Y'); ?></h4>
                    </div>

                    <?php if ( get_post_thumbnail_id( $post->ID ) ) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="page-content post__body">
                    <?php the_content(); ?>
                </div>

            <?php wp_reset_postdata(); endwhile; ?>

        </article>


<?php endif; ?>

</div>

<?php if ( $related_posts->have_posts() ) : ?>
<div class="related-posts backdrop">
    <?php the_partial('section-title', [
        'title' => 'Related Posts'
    ]); ?>
    <div class="grid grid-3-up">

        <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
            <div class="col">
                  <?php the_partial('post-preview', [
                      'url' => get_the_permalink($post->ID),
                      'title' => $post->post_title,
                      'date' => get_the_date( 'F j, Y' ),
                      'category' => false,
                      'img' => 'http://placehold.it/400x300',
                      'excerpt' => false,
                      'content' => $post->post_content,
                      'read_more' => true
                  ]); ?>

            </div>
        <?php endwhile; wp_reset_postdata(); ?>

    </div>

</div>
<?php endif; ?>

<?php get_footer(); ?>
