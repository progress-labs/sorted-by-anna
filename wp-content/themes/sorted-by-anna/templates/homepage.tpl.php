<?php

/**
 * Template Name: Home Page Template
 */

$service_objects = get_field( 'services' );
$portfolio_objects = get_field( 'portfolio_items' );
$testimonial_objects = get_field( 'testimonials_slider' );

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



<div class="page-container">

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <div class="content-wrap">
        <div class="page-content">

          <?php the_content(); ?>

        </div>
      </div>


    <?php endwhile; ?>
  <?php endif; ?>


  <?php the_partial('consultation-cta'); ?>
</div>




<?php

get_footer();

?>
