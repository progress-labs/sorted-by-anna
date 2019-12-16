<?php

/**
* Template Name: About Page
*/

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );

global $post;

$badges = array_map(function( $badge ) {
    return [
        'title' => $badge['badge_image']['title'],
        'image' => $badge['badge_image']['sizes']['thumbnail'],
        'url'   => $badge['badge_url']
    ];
}, get_field( 'badges' ));

get_header();

the_partial('nav');
?>

<main>

    <?php the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title(),
        'media' => false
    ]); ?>

    <div class="page-container">

        <?php if ( have_posts() ) : ?>
            <section class="page-section page-content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php the_content(); ?>


                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php if ( !empty( $badges ) ) : ?>
            <?php the_partial('section-title', [
                'title' => 'Awards and Organizations'
            ]); ?>

            <div class="grid grid-3-up grid--small">
                <?php foreach ($badges as $badge) : ?>
                    <div class="col">
                        <img src="<?php echo $badge['image']; ?>" alt="<?php echo $badge['title']; ?>">
                    </div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>
    </div>
    
    
    <?php the_partial('testimonials', [
        'slides' => get_field( 'testimonials_slider', $post->ID )
    ]); ?>



</main>








<?php

get_footer();

?>
