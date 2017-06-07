<?php

get_header();

var_dump();


the_partial('nav');
?>

<div id="page-container">
	<main role="main">

        <?php the_partial( 'page-hero', [
            'title' => get_the_title(get_queried_object_id())
        ]); ?>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-3-up">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col">
                        <?php the_partial('post-preview', [
                            'url' => get_the_permalink($post->ID),
                            'title' => $post->post_title,
                            'date' => get_the_date( 'F j, Y' ),
                            'category' => false,
                            'img' => 'http://placehold.it/400x300',
                            'excerpt' => false,
                            'content' => false,
                            'read_more' => false
                        ]); ?>
                    </div>

                <?php wp_reset_postdata(); endwhile; ?>

            </div>
        <?php endif; ?>

    </main><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
