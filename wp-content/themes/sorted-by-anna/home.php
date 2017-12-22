<?php

get_header();
the_partial('nav');

$blog_page_id = get_option( 'page_for_posts' );

$image = get_template_directory_uri() . '/assets/img/blog-bg.jpg';
?>

<div id="page-container">

	<main role="main">

        <?php the_partial( 'hero', [
            'image' => $image,
            'title' => get_the_title( $blog_page_id )
        ]); ?>

        <?php if ( have_posts() ) : ?>
        <section class="page-section">
            <div class="masonry-grid" data-js-component="masonryGrid">
                <div class="sizer"></div>
                <div class="gutter"></div>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col">
                        <?php the_partial('post-preview', [
                            'id' => $post->ID,
                            'url' => get_the_permalink($post->ID),
                            'title' => $post->post_title,
                            'date' => get_the_date( 'F j, Y' ),
                            'category' => false,
                            'img' => false,
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
