<?php

get_header();

$post;

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

the_partial('nav');

the_partial('hero', [
    'image' => 'http://placehold.it/1200x400',
    'title' => $term->name
]);

$featured_post = [
    'id' => $wp_query->posts[0]->ID,
    'content' => $wp_query->posts[0]->post_title
];

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
            <?php 
                the_partial('featured-project', [
                    'project' => $featured_post
                ]);
            ?>
        </section>

        <section class="page-section">

            <div class="grid grid-3-up jb">
                <?php while( have_posts() ) : the_post(); ?>
                    <?php if ( $wp_query->current_post !== 0 ) : ?> 

                        <div class="col">
                            <?php the_partial('post-preview', [
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

                    <?php endif; ?>
                    


                <?php endwhile; wp_reset_postdata();?>

            </div>
        </section>

    <?php endif; ?>

</div>


<?php get_footer();?>
