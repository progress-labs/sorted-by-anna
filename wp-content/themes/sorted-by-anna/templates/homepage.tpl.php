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

$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => '3'
);
$blog_query = new WP_Query( $blog_args );

$featured_projects = array_map(function( $project ) {

    $term = get_the_terms($project->ID, 'services')[0];
    $content = get_field( 'project_testimonial', $project->ID ) ? get_field( 'project_testimonial', $project->ID )[0]->post_content : $project->post_title;

    return [
        'id' => $project->ID,
        'title' => $project->post_title,
        'content' => $content,
        'term' => [
            'id' => $term->term_id,
            'slug' => $term->slug,
            'name' =>  $term->name
        ]
    ];

}, get_field( 'featured_projects' ) );


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

<div class="page-section">
    <div class="big-quote">
        <blockquote>
            Simplicity is making the journey of life with the things you love most.
        </blockquote>
    </div>
</div>


<?php foreach ($featured_projects as $project) : ?>
    <div class="featured-project">
        <div class="featured-project__primary">
            <div class="featured-project__media-wrap">
                <img class="featured-project__image" src="<?php echo get_the_post_thumbnail_url( $project['id'] );?>" alt="">

            </div>
            <div class="show-at-small">
                <a class="featured-project__cat-cta" href="<?php echo get_term_link( $project['term']['id'] ); ?>">View All <?php echo $project['term']['name']; ?> ⟶</a>
            </div>
        </div>

        <a href="<?php echo get_the_permalink( $project['id'] );?>" class="featured-project__content">
            <?php echo $project['content']; ?>
            <span  class="featured-project__cta">View Project ⟶</span>
        </a>

        <div class="hide-at-small">
            <a class="featured-project__cta featured-project__cta--mobile" href="<?php echo get_term_link( $project['term']['id'] ); ?>">View All <?php echo $project['term']['name']; ?> ⟶</a>
        </div>
    </div>
<?php endforeach; ?>





<div class="page-section">
    <div class="service-statement">
        <h2>Sorted By Anna offers a range of services to fit client needs to help make the most of your home. </h2>
    </div>
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
        <div class="press-grid backdrop">

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


<div class="page-section">
    <div class="backdrop">
        <?php the_partial( 'section-title', [
            'title' => 'Fresh From The Blog'
        ]); ?>
        <div class="grid grid-3-up">
            <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                <div class="col">
                    <?php the_partial('post-preview', [
                        'url'    => get_the_permalink( $post->ID ),
                        'title'  => $post->post_title,
                        'img'    => 'http://placehold.it/400x300',
                        'date'   => get_the_date( 'F j, Y' ),
                        'excerpt' => false,
                        'content' => $post->post_content,
                        'read_more' => true
                    ]); ?>
                </div>

            <?php wp_reset_postdata(); endwhile; ?>
        </div>
    </div>
</div>

<div class="page-section">
    <?php the_partial('consultation-cta'); ?>
</div>


<?php

get_footer();

?>
