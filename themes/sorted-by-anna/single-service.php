<?php
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

get_header();

$services = array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'orderby' => 'rand'
);
$services_query = new WP_Query( $serivce );

$serivce_args = array(
    'post_type' => 'project',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_services = new WP_Query( $serivce_args );

the_partial('nav');

the_partial('hero', [
  'image' => 'http://placehold.it/1200x400',
  'title' => get_the_title(get_queried_object_id())
]);

get_footer();?>
