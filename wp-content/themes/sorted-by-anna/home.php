<?php

get_header();

var_dump();


the_partial('nav');
?>

<div id="page-container">
	<main role="main">

        <?php the_partial( 'hero', [
            'image' => 'http://placehold.it/1200x400',
            'title' => get_the_title(get_queried_object_id())
        ]); ?>

        <?php if ( have_posts() ) : ?>
        <section class="page-section">
            <div class="masonry-grid" data-js-component="masonryGrid">
                <div class="sizer"></div>
                <div class="gutter"></div>
                <?php while ( have_posts() ) : the_post(); ?>
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

                <?php wp_reset_postdata(); endwhile; ?>

            </div>
        </section>

        <?php endif; ?>

    </main><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
