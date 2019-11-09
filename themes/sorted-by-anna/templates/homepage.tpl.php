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

$projects = [get_field('first_project', $post->ID ), get_field('second_project', $post->ID)];

$press = get_field( 'featured_press', $post->ID );


get_header();

the_partial('nav');
?>

<?php the_partial('hero', [
  'title' => 'Let’s Get Sorted Together!',
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


<?php if ( $projects ) : ?>
<?php foreach ( $projects as $project ) {
    the_partial('featured-project', [
        'project' => $project
    ]);
} ?>
<?php endif; ?>


<div class="page-section">
    <div class="service-statement">
        <h2>Sorted By Anna offers a range of services to fit each client's needs.</h2>
    </div>
</div>


<section class="page-section">
    <div class="page-container">
        <?php if ( !empty( $services ) ) : ?>
            <div class="grid grid-3-up">

                <?php foreach ( $services->posts as $service ) : ?>
                    <div class="col">
                        <?php the_partial( 'services-card', [
                            'link' => get_field( 'services_page_link', $service->ID ),
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
                            <?php if ( true ) : ?>
                                <img src="<?php echo get_field( 'logo',  $p->ID ); ?>" alt="">
                            <?php else : ?>
                                <h2 class="press__article-title"><?php echo get_field('display_name', $p->ID); ?></h2>
                            <?php endif; ?>
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
