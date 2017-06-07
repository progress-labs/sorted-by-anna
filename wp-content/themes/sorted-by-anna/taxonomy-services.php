<?php

get_header();

$post;

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

the_partial('nav');

the_partial('page-hero', [
    'title' => $term->name
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
            <div class="grid grid-4-up">
                <?php while( have_posts() ) : the_post(); ?>

                    <div class="col">
                        <?php the_partial('post-preview', [
                            'url' => get_the_permalink($post->ID),
                            'title' => get_the_title($post->ID),
                            'category' => false,
                            'img' => 'http://placehold.it/400x300',
                            'excerpt' => false,
                            'content' => false,
                            'read_more' => false
                        ]); ?>
                    </div>
                <?php endwhile; wp_reset_postdata();?>

            </div>
        </section>

    <?php endif; ?>

</div>


<?php get_footer();?>
