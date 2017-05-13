<?php

get_header();

$services_taxonomy = 'services';

$terms = array_map( function($term){
    return [
        'id' => $term->term_id,
        'slug' => $term->slug
    ];
},  get_terms(['taxonomy' => $services_taxonomy ]));

$services_posts = [];

foreach ($terms as $term) {

    $services_posts[] = get_posts([
        'numberposts'   => 4, // get all posts.
        'post_type' => 'portfolio',
        'tax_query'  => array(
            array(
                'taxonomy' => $services_taxonomy,
                'field' => 'id',
                'terms' => $term['id']
            )
        )
    ]);

    echo get_term_link( $term['id'] );
    echo '<hr>';
}



?>


<?php the_partial('page-hero', [
    'title' => 'Portfolio'
]); ?>
 <?php if ( have_posts() ) : ?>

     <section class="page-section">
         <div class="grid grid-4-up">
             <?php foreach ($services_posts as $item => $portfolio ) : ?>

                 <div class="col">
                     <?php the_partial('post-preview', [
                         'url' => get_the_permalink($portfolio[0]->ID),
                         'title' => $portfolio[0]->post_title,
                         'category' => get_the_terms($portfolio[0]->ID, 'services')[0]->name,
                         'img' => 'http://placehold.it/400x300',
                         'excerpt' => false,
                         'content' => false,
                         'read_more' => false
                     ]); ?>
                 </div>
             <?php endforeach; ?>

        </div>
     </section>

 <?php endif; ?>

<?php get_footer();?>
