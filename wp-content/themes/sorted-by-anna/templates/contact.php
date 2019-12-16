<?php

/**
* Template Name: Contact Page Template
*/

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

global $post;

$args = array(
    'post_type' => 'service'
);

$the_query = new WP_Query( $args );


get_header();

the_partial('nav');
?>

<main>

    <?php the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title(),
        'media' =>  false
    ]); ?>

    <div class="page-container">

        <div class="page-content page-section">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="page-content">

                        <?php the_content(); ?>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>








<?php

get_footer();

?>
