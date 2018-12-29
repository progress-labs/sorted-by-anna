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
        <?php if ( $services  ) : ?>
            <div class="grid grid-3-up jc">

                <?php foreach ( $services as $post ) : ?>

                    <div class="col">
                        <?php the_partial( 'services-card', [
                            'title' => $post->post_title,
                            'list' => get_field( 'service_types', $post->ID ) ? array_map( function( $item ) {
                                return [
                                    'name' => $item['name']
                                ];
                            }, get_field( 'service_types', $post->ID )) : false
                        ]); ?>
                    </div>
                <?php endforeach;?>

            </div>
        <?php endif; wp_reset_postdata(); ?>
    </section>

    <?php if ( $testimonials ) : ?>
    <div class="page-section">
          <?php the_partial( 'testimonials', [
              'slides' => $testimonials
          ] ); ?>
    </div>
    <?php endif; ?>

    <section class="page-section">
        <?php the_partial('how-to-list', [
          'title' => 'How It Works',
          'list'  => get_field( 'how_it_works' )
        ]) ?>
    </section>



    <div class="page-section">
        <div class="service-statement">
            <h2>We offer in-home and virtual organization. Take a look!</h2>
        </div>
        <div class="backdrop backdrop--white">
            <div class="grid grid-3-up">

                <?php while ( $related_projects->have_posts() ) : $related_projects->the_post(); ?>
                    <div class="col">
                        <?php the_partial('post-preview', [
                            'id' => $post->ID,
                            'url' => get_the_permalink( $post->ID ),
                            'title' => $post->post_title,
                            'img' => get_the_post_thumbnail_url( $post->ID ),
                            'excerpt' => get_the_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : false,
                            'date' => false,
                            'category' => false,
                            'content' => false,
                            'read_more' => true
                        ]); ?>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            </div>
        </div>
    </div>

    <?php the_partial('consultation-cta', [
        'has_bg' => true
    ]); ?>

    <section class="page-section">
        <?php the_partial('image-collage', [
            'large_images' => get_field('large_images')
        ]); ?>
    </section>

</main>

<?php

get_footer();

?>
