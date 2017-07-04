<?php

/**
 * Template Name: Affiliatons Page Template
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-service-view-model.php' );

global $post;

$args = array(
  'post_type' => 'affiliation'
);

$the_query = new WP_Query( $args );


get_header();

the_partial('nav');
?>

<main>

    <?php the_partial( 'hero', [
        'image' => 'http://placehold.it/1200x400',
        'title' => get_the_title()
    ]); ?>

  <div class="page-container">

    <div class="content-wrap">

    <?php if ( have_posts() ) : ?>
        <section class="page-section">
            <?php while ( have_posts() ) : the_post(); ?>

              <div class="page-content">

                <?php the_content(); ?>

              </div>

            <?php endwhile; ?>
        </section>
    <?php endif; ?>

    <?php if ( $the_query->have_posts() ) : ?>
        <section class="page-section">
            <div class="grid grid-3-up">

                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      <div class="col">
                          <?php the_partial( 'affiliate-card', [
                            'affiliate' => $post,
                            'is_centered' => true,
                            'is_small' => true,
                            'url' => get_field( 'affiliate_link' )
                          ]) ?>
                      </div>


                  <?php endwhile; wp_reset_postdata();?>

            </div>
        </section>
    <?php endif; ?>

    <?php if ( get_field( 'discount_message' ) || get_field( 'discount_list' ) ) : ?>
        <div class="discount-section">

            <?php echo get_field( 'discount_message' ); ?>

            <?php if ( get_field( 'discount_list' ) ) : ?>
                <ul class="discount-section__list">
                    <?php foreach ( get_field( 'discount_list' ) as $discount ) : ?>
                        <li class="discount-section__list-item"><?php echo $discount['discount_text']; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>
    <?php endif; ?>


    <?php the_partial( 'consultation-cta' ); ?>

    </div>
  </div>



</main>








<?php

get_footer();

?>
