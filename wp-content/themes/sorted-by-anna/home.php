<?php

include_once( get_template_directory() . '/functions/random-image.php' );

$foo = new Placeholder_Image();


get_header();

the_partial('nav');

$blog_page_id = get_option( 'page_for_posts' );

$image = get_template_directory_uri() . '/assets/img/blog-bg.jpg';
?>

<div id="page-container">

    <img class="test-image" src="<?php echo $foo->get_image(); ?>" alt="">
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
