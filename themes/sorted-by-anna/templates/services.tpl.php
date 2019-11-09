<?php

/**
* Template Name: Services Page Template
*/

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

global $post;


$project_args = array(
    'post_type' => 'project',
    'posts_per_page' => 3,
    'orderby' => 'rand'
);

$related_projects = new WP_Query( $project_args );

$services = get_field( 'featured_services', $post->ID );
$testimonials = get_field( 'testimonials_slider', $post->ID );

get_header();

the_partial('nav');
?>

<main>
    <?php

    the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title(),
        'media' => false
    ]);

    if ( have_posts() ) : ?>
        <section class="page-container page-section">
            <?php while ( have_posts() ) : the_post(); ?>
                
            <div class="page-content">

                <?php the_content(); ?>

            </div>

            <?php endwhile; wp_reset_postdata(); ?>
        </section>

    <?php endif; ?>
    
    <section class="page-section">
        <?php the_partial('how-to-list', [
          'title' => 'How It Works',
          'list'  => get_field( 'how_it_works' )
        ]) ?>
    </section>

    <section class="page-section">
        <?php if ( $services  ) : ?>

            <?php foreach ( $services as $post ) : ?>
                <?php the_partial('single-color-block', [
                    'title' => $post->post_title,
                    'image' => get_the_post_thumbnail_url( $post->ID ),
                    'description' => get_field( 'service_blurb', $post->ID ),
                    'list' => get_field( 'service_types', $post->ID )
                ]); ?>
            <?php endforeach;?>

        <?php endif; wp_reset_postdata(); ?>
    </section>
    
    
    <?php the_partial('consultation-cta', [
        'text' => 'Can\'t find anything you like?',
        'has_bg' => false
    ]); ?>

    <?php if ( $testimonials ) : ?>
    <div class="page-section">
          <?php the_partial( 'testimonials', [
              'slides' => $testimonials
          ] ); ?>
    </div>
    <?php endif; ?>

    <section class="page-section">
        <?php 
        the_partial('image-collage', [
            'large_images' => array_map(function( $image ) {
                $image_url = $image['sizes'];
                return [
                    'image' => $image_url['large'],
                    'image_lg' => $image_url['large'],
                    '3x2' => $image_url['3x2'],
                    'alt' => $image['alt'] ? $image['alt'] : $image['title']
                ];
            }, get_field('large_images'))
        ]); ?>
    </section>

</main>

<?php

get_footer();

?>
