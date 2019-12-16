<?php
get_header();

the_partial('nav');

$blog_page_id = get_option( 'page_for_posts' );

$image = get_template_directory_uri() . '/assets/img/blog-bg.jpg';

$posts = new WP_Query([
    'post_type' => 'post',
    'status' => 'published',
    'posts_per_page' => -1
]);

?>

<div id="page-container">
	<main role="main">

        <?php the_partial( 'hero', [
            'btn' => false,
            'image' => get_the_post_thumbnail_url($blog_page_id) ? get_the_post_thumbnail_url($blog_page_id) : $image,
            'media' => false,
            'title' => get_the_title( $blog_page_id )
        ]); ?>

        <?php if ( $posts->have_posts() ) : ?>
        <section class="page-section">
            <div class="masonry-grid" data-js-component="masonryGrid">
                <div class="sizer"></div>
                <div class="gutter"></div>
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                    <div class="col">
                        <?php the_partial('post-preview', [
                            'id' => $post->ID,
                            'url' => get_the_permalink($post->ID),
                            'title' => $post->post_title,
                            'date' => false,
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
