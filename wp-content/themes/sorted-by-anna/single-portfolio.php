<?php
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

global $post;

get_header();

$portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_portfolios = new WP_Query( $portfolio_args );

$categories = wp_get_post_terms($post->ID, 'services');

$testimonial = get_field( 'project_testimonial' );

the_partial('nav');
?>

<main class="single-project">
    <div class="page-container">

    <?php while (have_posts()): the_post();

    $project = new Portfolio_View_Model($post); ?>

    <div class="content-wrap">
        <div class="single-project__header">
            <h1 class="project-title">
                <?php echo $project->get_title(); ?>
            </h1>

            <span class="project-date">
                <?php echo $project->post_date(); ?>
            </span>

            <?php if ( !empty( $categories ) ): ?>
            <div class="post-categories">
                <span>Services:</span>
                <ul class="post-categories__list">
                    <?php foreach ($categories as $cat): ?>
                        <li class="post-categories__item"><?php echo $cat->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>


        <div class="page-content">

            <?php the_content(); ?>

        </div>

        <?php if ( $project->gallery() ) : ?>
            <div class="gallery" data-js-component="gallery">
                <?php foreach ($project->gallery() as $gallery) : ?>

                    <div class="gallery__slide">
                        <div class="gallery__slide-inner">
                            <div class="gallery__img-wrap">
                                <img class="gallery__img" src="<?php echo $gallery['image']; ?>" alt="">
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>


    <?php endwhile; wp_reset_postdata();?>

    </div>

    <?php if ( $testimonial ) : ?>
        <section class="page-section">
            <?php the_partial( 'single-testimonial', [
                'testimonial' => $testimonial[0]
            ]); ?>
        </section>
    <?php endif; ?>

</main>





<?php get_footer();?>
