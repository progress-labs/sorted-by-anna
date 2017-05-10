<?php

/**
* Template Name: About Page
*/

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );

global $post;

get_header();

$badges = array_map(function( $badge ) {
    return [
        'image' => $badge['badge_image']['sizes']['thumbnail'],
        'url' => $badge['badge_url']
    ];
}, get_field( 'badges' ));


?>

<main>

    <?php the_partial( 'page-hero', array(
        'title' => get_the_title()
    )); ?>

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
                        <a class="badge" href="<?php echo $badge['url']; ?>">
                            <img src="<?php echo $badge['image']; ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>


    </div>
</div>



</main>








<?php

get_footer();

?>
