<?php

/**
 * Template Name: Home Page Template
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

$services_args = array(
    'post_type' => 'service'
);
$services_query = new WP_Query( $services_args );

$press_args = array(
    'post_type' => 'press',
    'orderby'   => 'rand',
    'posts_per_page' => '4'
);
$press_query = new WP_Query( $press_args );

get_header();

the_partial('nav');
?>

<?php the_partial('hero', [
  'title' => 'How can I help you do stuff?',
  'media' => [
    'img' => get_field('hero', $post->ID)['sizes']['large'],
    'video' => [
      'src' => get_field('video_file', $post->ID),
      'fallback' => get_field('video_fallback_image', $post->ID)['sizes']['large']
    ]
  ],
  'btn' => [
    'text' => 'Book A Thing',
    'url' => '#'
  ]
]); ?>

<div class="big-quote">
    <blockquote>
        Simplicity is making the journey of life with the things you love most.
    </blockquote>
</div>


<div class="featured-project">
    <div class="featured-project__primary">
        <div class="featured-project__media-wrap">
            <img class="featured-project__image" src="http://imgur.com/OcP4tAP.jpg" alt="">
        </div>
        <div class="show-at-small">
            <a class="featured-project__cat-cta" href="#">View All Living Rooms ⟶</a>
        </div>
    </div>

    <a href="#" class="featured-project__content">
        “Anna really made our home come to life. For months our home still felt like “a place we rented” until Anna taught us how to turn a house into a home that we love daily.”

        <span  class="featured-project__cta">View Project ⟶</span>
    </a>

    <div class="hide-at-small">
        <a class="featured-project__cta featured-project__cta--mobile" href="#">View All Living Rooms ⟶</a>
    </div>
</div>

<div class="featured-project">
    <div class="featured-project__primary">
        <div class="featured-project__media-wrap">
            <img class="featured-project__image" src="http://imgur.com/OcP4tAP.jpg" alt="">
        </div>
        <div class="show-at-small">
            <a class="featured-project__cat-cta" href="#">View All Living Rooms ⟶</a>
        </div>

    </div>

    <a href="#" class="featured-project__content">
        “Anna really made our home come to life. For months our home still felt like “a place we rented” until Anna taught us how to turn a house into a home that we love daily.”

        <span  class="featured-project__cta">View Project ⟶</span>
    </a>

    <div class="hide-at-small">
        <a class="featured-project__cta featured-project__cta--mobile" href="#">View All Living Rooms ⟶</a>
    </div>

</div>


<div class="service-statement">
    <h2>Sorted By Anna offers a range of services to fit client needs to help make the most of your home. </h2>
</div>


<section class="page-section">
    <?php if ( $services_query->have_posts() ) : ?>
        <div class="grid grid-3-up">

            <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>

            <div class="col">
                <?php the_partial( 'services-card', [
                    'service' => $post,
                    'image' => false
                ]); ?>
                </div>
            <?php endwhile; wp_reset_postdata();?>

        </div>
    <?php endif; ?>
</section>


<?php the_partial('consultation-cta'); ?>

<section class="page-section">
    <?php if ( $press_query->have_posts() ) : ?>
        <div class="press-grid">

            <?php the_partial('section-title', [
                'title' => 'Featured Press'
            ]); ?>

            <div class="grid grid-4-up ">

                <?php while ( $press_query->have_posts() ) : $press_query->the_post(); ?>

                <div class="col">
                    <a href="<?php echo get_field( 'article_link', $post->ID ); ?>" class="press">
                        <?php the_post_thumbnail( $post->ID ); ?>
                    </a>

                </div>

                <?php endwhile; wp_reset_postdata();?>

            </div>
        </div>

    <?php endif; ?>
</section>


<?php

get_footer();

?>
