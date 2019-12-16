
<?php

/**
* Template Name: Press
*/

$press = get_field( 'featured_press', $post->ID );

get_header();

the_partial('nav');

?>

<main>

    <?php the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title(),
        'media' => false
    ]); ?>

    <div class="page-section page-container">
        <?php if ( have_posts() ) : ?>
            <section class="page-section">
                <?php while ( have_posts() ) : the_post(); ?>
                  <div class="page-content">
                    <?php the_content(); ?>
                  </div>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php if ( $press ) : ?>
            <div class="grid grid-3-up">
                <?php foreach ( $press as $p ) : ?>
                    <div class="col">
                        <?php if (get_field( 'article_link', $p->ID ) ) : ?>
                            <a href="<?php echo get_field( 'article_link', $p->ID ); ?>" class="press" target="_blank">
                        <?php else : ?>
                            <div class="press">
                        <?php endif; ?>
                            <?php if ( true ) : ?>
                                <img src="<?php echo get_field( 'logo',  $p->ID ); ?>" alt="">
                            <?php else : ?>
                                <h2 class="press__article-title"><?php echo get_field('display_name', $p->ID); ?></h2>
                            <?php endif; ?>
                        
                        <?php if (get_field( 'article_link', $p->ID ) ) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>



</main>

<?php

get_footer();

?>
