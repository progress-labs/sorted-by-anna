<?php

get_header();

$services_taxonomy = 'services';

$terms = array_map( function($term){
    return [
        'name' => $term->name,
        'id' => $term->term_id,
        'slug' => $term->slug
    ];
},  get_terms(['taxonomy' => $services_taxonomy ]));

$services_posts = [];

foreach ($terms as $term) {

}





?>


<?php the_partial('page-hero', [
    'title' => 'Portfolio'
]); ?>

<div class="page-container">
    <?php if ( have_posts() ) : ?>

        <?php foreach ( $terms as $term ) :

            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'services',
                    'field' => 'id',
                    'terms' => $term['id']
                     )
                  )
                );
                $query = new WP_Query( $args );
        ?>
        <?php if ( $query->have_posts() ) : ?>
            <section class="page-section">

                <h2 class="tax-title"> <?php echo $term['name']; ?></h2>

                <div class="grid grid-4-up">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col">
                            <?php the_partial('post-preview', [
                                'url' => get_the_permalink($post->ID),
                                'title' => $post->post_title,
                                'category' => get_the_terms($post->ID, 'services')[0]->name,
                                'img' => 'http://placehold.it/400x300',
                                'excerpt' => false,
                                'content' => false,
                                'read_more' => false
                            ]); ?>
                        </div>

                    <?php wp_reset_postdata(); endwhile; ?>
                </div>

                <a class="btn btn--centered" href="<?php echo get_term_link( get_the_terms($post->ID, 'services')[0]->term_id ); ?>">View All</a>
            </section>

        <?php endif; ?>


            </section>
        <?php endforeach; ?>


    <?php endif; ?>
</div>



<?php get_footer();?>
