<?php

/**
* Template Name: Services Page Template
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
    <?php 
    
    the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title()
    ]); 
    
    if ( have_posts() ) : ?>
        <section class="page-section">
            <? while ( have_posts() ) : the_post(); ?>

            <div class="page-content">

                <?php the_content(); ?>

            </div>

            <?php endwhile; wp_reset_postdata();?>
        </section>

    <?php endif; ?>

    <section class="page-section">
        <?php if ( $the_query->have_posts() ) : ?>
            <div class="grid grid-3-up">

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div class="col">
                    <?php the_partial( 'services-card', [
                        'service' => $post
                    ]); ?>
                    </div>
                <?php endwhile; wp_reset_postdata();?>

            </div>
        <?php endif; ?>
    </section>

    <section class="page-section">
        <?php the_partial('how-to-list', [
          'title' => 'How It Works',
          'list'  => get_field('how_it_works')
        ]) ?>
    </section>

    <section class="page-section">
        <?php the_partial('image-collage', [
            'small_images' => get_field('small_images'),
            'large_images' => get_field('large_images')
        ]); ?>
    </section>



</main>










<?php

get_footer();

?>
