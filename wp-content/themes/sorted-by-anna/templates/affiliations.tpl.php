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
?>

<main>
  <div class="page-container">

    <?php the_partial( 'page-hero', array(
    'title' => get_the_title()
    )); ?>

    <div class="content-wrap">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <div class="page-content">

          <?php the_content(); ?>

        </div>

      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( $the_query->have_posts() ) : ?>
        <div class="services-section">

          <?php while ( $the_query->have_posts() ) : $the_query->the_post();
            $service = new Services_View_model( $post ); ?>

              <?php the_partial( 'services-preview', [
                'service' => $service
              ]) ?>

          <?php endwhile; wp_reset_postdata();?>

        </div>
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
