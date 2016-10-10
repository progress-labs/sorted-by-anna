<?php 

/**
 * Template Name: Home Page Template
 */

$service_objects = get_field( 'services' );
$portfolio_objects = get_field( 'portfolio_items' );
$testimonial_objects = get_field( 'testimonials' );

get_header();

the_partial('nav');
?>

<?php the_partial('hero', array(
  'title' => 'How can I help you do stuff?',
  'media' => array(
    'img' => get_field('hero', $post->ID)['sizes']['large'],
    'video' => array(
      'src' => get_field('video_file', $post->ID),
      'fallback' => get_field('video_fallback_image', $post->ID)['sizes']['large']
    )
  ),
  'btn' => array(
    'text' => 'Book A Thing',
    'url' => '#'
  )
)); ?>

<div class="page-container">

  <?php the_partial('homepage-feature-section', array(
    'title'         => 'Services', 
    'object_group'  => $service_objects,
    'page_id'       => 13
  )); ?>

  <?php the_partial('homepage-feature-section', array(
    'title'         => 'Portfolio', 
    'object_group'  => $portfolio_objects,
    'page_id'       => 13
  )); ?>

  <?php the_partial('homepage-feature-section', array(
    'title'         => 'Testimonials', 
    'object_group'  => $testimonial_objects,
    'page_id'       => 13
  )); ?>

</div>



<?php 

get_footer();

?>