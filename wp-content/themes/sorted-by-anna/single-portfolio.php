<?php
include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

global $post;

get_header();

$portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() )
);

$related_portfolios = new WP_Query( $portfolio_args );
?>

<main class="single-project">
    <div class="page-container">

    <?php while (have_posts()): the_post();

    $project = new Portfolio_View_Model($post); ?>

    <div class="content-wrap">
        <div class="single-project__header">
            <h1 class="project-title">
                <?php echo $post->post_title; ?>
            </h1>

            <span class="project-date">
                <?php echo date( 'F jS, Y', strtotime( $post->post_date) );?>
            </span>
        </div>

        <?php the_content(); ?>

        <?php if ( $project->gallery() ) : ?>
            <div class="gallery" data-js-component="gallery">
                <?php foreach ($project->gallery() as $gallery) : ?>
                    <a href="<?php echo $gallery['image_lg']; ?>"
                    class="gallery__item"
                    data-featherlight="image">
                        <div class="gallery__img-wrap">
                            <img class="gallery__img" src="<?php echo $gallery['image']; ?>" alt="">
                        </div>

                    </a>


                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>


    <?php endwhile; ?>

    </div>




    <div class="related-projects">
        <?php while ( $related_portfolios->have_posts() ) : $related_portfolios->the_post(); $related_project = new Portfolio_View_Model( $post );?>

            <?php the_partial( 'related-project', array(
                'project' => $related_project
            )); ?>


        <?php endwhile; ?>
    </div>

    <?php var_dump( get_field('single_testimonial') ); ?>


    <?php the_partial('consultation-cta'); ?>
</main>





<?php get_footer();?>
