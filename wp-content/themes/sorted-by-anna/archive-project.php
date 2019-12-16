<?php

get_header();


$services_taxonomy = 'services';

$terms = array_map( function( $term ) {
    return [
        'name' => $term->name,
        'id' => $term->term_id,
        'slug' => $term->slug
    ];
},  get_terms([ 'taxonomy' => $services_taxonomy ]));

$projects = get_field('projects', 'option');

the_partial('nav');

the_partial('hero', [
    'image' => get_field('hero_image', 'option') ? get_field('hero_image', 'option') :  get_template_directory_uri() . '/assets/img/blog-bg.jpg',
    'media' => false,
    'title' => 'Projects'
]); 

?>

<div class="page-container">
    <?php if ( $projects ) : ?>
            <section class="page-section">
                <div class="grid grid-3-up">
                    
                    <?php foreach ($projects as $project) : ?>
                        <div class="col">
                            <?php the_partial('post-preview', [
                                'id' => $project->ID,
                                'url' => get_the_permalink($project->ID),
                                'title' => $project->post_title,
                                'img' => get_the_post_thumbnail_url( $project->ID ),
                                'category' => false,
                                'date' => false,
                                'excerpt' => false,
                                'content' => false,
                                'read_more' => true
                            ]); ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </section>
    <?php endif; ?>
</div>

<?php the_partial('testimonials', [
    'slides' => get_field( 'testimonials', 'option' )
]); ?>

<?php the_partial('consultation-cta'); ?>

<?php get_footer();?>
