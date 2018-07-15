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
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title()
]); ?>

<?php if ( the_content() ) : ?>
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

<?php if ( $testimonials ) : ?>
<div class="page-section">
      <?php the_partial( 'testimonials' ); ?>
</div>
<?php endif; ?>

<div class="page-section">
    <div class="color-block">
        <div class="color-block__image">
            <img src="http://placehold.it/500x600" alt="">
        </div>
        <div class="color-block__inner">

            <div class="color-block__content">
                <h3 class="color-block__title">This is a title</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt, cumque dolor? Doloribus libero quasi voluptatem enim magni, ab ipsa qui sunt aliquam recusandae accusamus repellat, error dignissimos! Eius, temporibus.
            </div>
        </div>
    </div>
    <div class="color-block">
        <div class="color-block__image">
            <img src="http://placehold.it/500x600" alt="">
        </div>
        <div class="color-block__inner">

            <div class="color-block__content">
                <h3 class="color-block__title">This is a title</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt, cumque dolor? Doloribus libero quasi voluptatem enim magni, ab ipsa qui sunt aliquam recusandae accusamus repellat, error dignissimos! Eius, temporibus.
            </div>
        </div>
    </div>
</div>

<div class="backdrop">
    <?php the_partial( 'section-title', [
        'title' => 'Recent Projects'
    ]); ?>

    <div class="grid grid-3-up">
        <?php foreach ( $featured_projects as $project ) : ?>
            <div class="col">
                <?php the_partial('post-preview', [
                    'url'    => get_the_permalink( $project->ID ),
                    'title'  => get_the_title( $project->ID ),
                    'img'    => 'http://placehold.it/400x300',
                    'date'   => get_the_date( 'F j, Y' ),
                    'category' => false,
                    'excerpt' => false,
                    'content' => $project->post_content,
                    'read_more' => true
                ]); ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>



<?php

the_partial('consultation-cta');


get_footer();

?>
