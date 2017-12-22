<?php
$post;

get_header();

$current_term_id = 'services_' . get_the_terms( get_the_ID(), 'services')[0]->term_id;

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

the_partial('nav');

the_partial('hero', [
    'image' => get_field('featured_image', $current_term_id)['url'],
    'title' => $term->name,
    'btn' => false
]);

?>

<div class="page-container">

    <?php if ( $term->description ): ?>
        <section class="page-section">
            <div class="page-content">
                <p><?php echo $term->description; ?></p>
            </div>
        </section>
    <?php endif; ?>


    <?php if ( have_posts() ) : ?>

        <section class="page-section">

            <div class="masonry-grid" data-js-component="masonryGrid">
                <div class="sizer"></div>
                <div class="gutter"></div>
                <?php while( have_posts() ) : the_post(); ?>

                        <div class="col">
                            <?php the_partial('post-preview', [
                                'id' => $post->ID,
                                'url' => get_the_permalink( $post->ID ),
                                'title' => get_the_title( $post->ID ),
                                'category' => false,
                                'img' => get_the_post_thumbnail_url( $post->ID ),
                                'date' => get_the_date( 'F j, Y'),
                                'excerpt' => get_the_excerpt( $post->ID ),
                                'content' => false,
                                'read_more' => true
                            ]); ?>
                        </div>

                <?php endwhile; wp_reset_postdata();?>

            </div>
        </section>

    <?php endif; ?>

</div>


<?php get_footer();?>
