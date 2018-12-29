<?php

/**
 * Template Name: Home Page Template
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

$services = new WP_Query([
    'post_type' => 'service',
    'posts_per_page' => 3
]);


$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => '3'
);
$blog_query = new WP_Query( $blog_args );


$featured_projects = array_map( function( $project ) {
    $term = false;

    if ( !empty(get_the_terms($project->ID, 'services') ) ) {
        $term = [
            'id' => get_the_terms($project->ID, 'services')[0]->term_id,
            'slug' => get_the_terms($project->ID, 'services')[0]->slug,
            'name' =>  get_the_terms($project->ID, 'services')[0]->name
        ];
    } else {
        $term = false;
    }

    $content = get_field( 'project_testimonial', $project->ID ) ? get_field( 'project_testimonial', $project->ID )[0]->post_content : $project->post_title;

    return [
        'id' => $project->ID,
        'content' => $content,
        'term' => $term
    ];

}, get_field( 'featured_projects' ) );

$press = get_field( 'featured_press', $post->ID );


get_header();

the_partial('nav');
?>

<?php the_partial('hero', [
  'title' => 'Let\'s get sorted!',
  'media' => [
    'img' => '#',
    'video' => true
  ]
]); ?>

<div class="page-section">
    <div class="big-quote">
        <blockquote>
            Simplicity is making the journey of life with the things you love most.
        </blockquote>
    </div>
</div>


<?php if ( $featured_projects ) : ?>
<?php foreach ( $featured_projects as $project ) {
    the_partial('featured-project', [
        'project' => $project
    ]);
} ?>
<?php endif; ?>


<div class="page-section">
    <div class="service-statement">
        <h2>Sorted By Anna offers a range of services to fit client needs to help make the most of your home. </h2>
    </div>
</div>


<section class="page-section">
    <div class="page-container">
        <?php if ( !empty( $services ) ) : ?>
            <div class="grid grid-3-up">

                <?php foreach ( $services->posts as $service ) : ?>
                    <div class="col">
                        <?php the_partial( 'services-card', [
                            'title' => $service->post_title,
                            'list' => get_field( 'service_types', $service->ID )
                        ]); ?>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
    </div>
</section>


<?php the_partial('consultation-cta'); ?>

<?php if ( $press ) : ?>
<section class="page-section">
        <div class="press-grid backdrop">

            <?php the_partial('section-title', [
                'title' => 'Featured Press'
            ]); ?>

            <div class="grid grid-4-up jc">
                <?php foreach ( $press as $p ) : ?>
                    <div class="col">
                        <a href="<?php echo get_field( 'article_link', $p->ID ); ?>" class="press" target="_blank">
                            <?php if ( has_post_thumbnail( $p->ID ) ) : ?>
                                <?php echo get_the_post_thumbnail( $p->ID, 'press' ); ?>
                            <?php endif; ?>

                            <div class="press__overlay">
                                <h3 class="press__article-title">
                                    <?php echo get_field( 'article_title', $p->ID ); ?>
                                </h3>
                            </div>

                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </section>
<?php endif; ?>

<?php the_partial( 'color-blocks'); ?>


<div class="page-section">
    <div class="backdrop">
        <?php the_partial( 'section-title', [
            'title' => 'Fresh From The Blog'
        ]); ?>

        <div class="page-container">
            <div class="grid grid-3-up">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <div class="col">
                        <?php the_partial('post-preview', [
                            'id' => $post->ID,
                            'url'    => get_the_permalink( $post->ID ),
                            'title'  => $post->post_title,
                            'img'    => 'http://placehold.it/400x300',
                            'date'   => get_the_date( 'F j, Y' ),
                            'content' => $post->post_content,
                            'excerpt' => false,
                            'read_more' => true
                        ]); ?>
                    </div>

                <?php wp_reset_postdata(); endwhile; ?>
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <?php the_partial('consultation-cta'); ?>
</div>


<?php

get_footer();

?>
