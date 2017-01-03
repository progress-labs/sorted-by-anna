<?php 

/**
 * Feature Section 
 *
 * This partial displays featured content in groups of 1-3 pieces of content
 *
 * title - passes in the title of the featured section
 * object_group - passes in the post object group from the ACF fields defined in the 
 * homepage template
 * page_id - used to get the page ID to create the 'view all' link
 */

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );
include_once( get_template_directory() . '/functions/view-models/class-portfolio-view-model.php' );

?>

<div class="feature-section">

  <h1 class="feature-section__title"><?php echo $title; ?></h1>

  <?php if ( $object_group ) : ?>

    <div class="feature-section__wrap">
      
      <?php foreach ( $object_group as $object ) : setup_postdata( $object ); ?>

        <div class="feature-section__card">

          <a href="<?php the_permalink($object); ?>">

            <?php if ( get_field('gallery_images', $object->ID) ) : 
              $img = get_field('gallery_images', $object->ID)[0]['image']['sizes']['medium'];
            ?>
              
              <img src="<?php echo $img; ?>" alt="">

            <?php elseif ( has_post_thumbnail( $object->ID ) ) : ?>
              
              <?php echo get_the_post_thumbnail( $object->ID, 'medium' ); ?>

            <?php endif; ?>

            <h2 class="feature-section__card-title"><?php echo get_the_title($object->ID); ?></h2>
          </a>

        </div>

      <?php endforeach; ?>

    </div>

  <?php endif; ?>
    <!-- Services Page ID -->
    <a class="btn btn--dark btn--centered" href="<?php echo get_page_link($page_id); ?>">
      <?php echo $btn_cta; ?>
    </a>
</div>