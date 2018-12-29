<?php

/**
 * Template Name: Service Details
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

$featured_projects = get_field( 'featured_projects' );
$testimonials = get_field( 'testimonials_slider' );
$how_it_works = get_field( 'how_it_works' );

get_header();

the_partial('nav');

the_partial( 'hero', [
        'media' => false,
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title()
]); ?>


<?php if ( $post->post_content ) : ?>
<div class="page-container page-section">

    <div class="page-content">
      <?php
              while ( have_posts() ) {
                the_post();

                the_content();
              }
        ?>
    </div>
</div>
<?php endif; ?>

<?php if ( $how_it_works ) : ?>
    <section class="page-section">
        <?php the_partial('how-to-list', [
          'title' => 'How It Works',
          'list'  => $how_it_works
        ]) ?>
    </section>
<?php endif; ?>


<?php if ( get_field( 'display_calendar' ) ) : ?>

  <?php the_partial( 'calendly-embed' ); ?>

<?php endif; ?>

<?php if ( get_field( 'large_images' ) ) : ?>
    <section class="page-section">
        <?php the_partial('image-collage', [
            'large_images' => get_field('large_images', $post->ID )
        ]); ?>
    </section>
<?php endif; ?>

<?php if ( $testimonials ) : ?>
<div class="page-section">
      <?php the_partial( 'testimonials', [
          'slides' => $testimonials
      ] ); ?>
</div>
<?php endif; ?>

<?php
the_partial( 'color-blocks');

the_partial('consultation-cta');

get_footer();
?>
