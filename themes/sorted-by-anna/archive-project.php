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


the_partial('nav');

the_partial('hero', [
    'image' => get_template_directory_uri() . '/assets/img/blog-bg.jpg',
    'media' => false,
    'title' => 'Projects'
]); 
?>

<div class="page-container">
    <?php if ( have_posts() ) : ?>

        <?php foreach ( $terms as $term ) :

            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 6,
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

                <div class="masonry-grid" data-js-component="masonryGrid">
                    <div class="sizer"></div>
                    <div class="gutter"></div>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col">
                            <?php the_partial('post-preview', [
                                'id' => $post->ID,
                                'url' => get_the_permalink($post->ID),
                                'title' => $post->post_title,
                                'category' => false,
                                'date' => get_the_date( 'F j, Y'),
                                'img' => get_the_post_thumbnail_url( $post->ID ),
                                'excerpt' => get_the_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : false,
                                'content' => false,
                                'read_more' => true
                            ]); ?>
                        </div>

                    <?php wp_reset_postdata(); endwhile; ?>
                </div>
                <?php if ( $query->found_posts > 6 ) : ?>
                    <a class="text-link btn--centered" href="<?php echo get_term_link( $term['id'] ); ?>">View All <?php echo $term['name']; ?> Projects ⟶</a>
                <?php endif; ?>
            </section>

        <?php endif; ?>


            </section>
        <?php endforeach; ?>

        <?php the_partial('consultation-cta'); ?>


    <?php endif; ?>
</div>



<?php get_footer();?>
