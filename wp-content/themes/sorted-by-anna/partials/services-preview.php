<?php 

/**
 * Services Preview
 *
 * Shows one item from the Services Post Type
 *
 **/

?>



<div class="services-preview">

  <div class="services-preview__media-wrap">
    <img class="services-preview__img" src="<?php echo $service->get_featured_thumbnail_url( 'medium' ); ?>" alt="<?php echo $service->get_title(); ?>">
  </div>

  <div class="services-preview__content">
    <h2 class="services-preview__title"><?php echo $service->get_title(); ?></h2>  

    <?php if ( $service->get_content()  ) : ?>

      <?php echo $service->get_content(); ?>

    <?php endif; ?>


    <?php if ( $service->get_service_options()) : ?>

      Services Include:
      <ul class="services-preview__list">

        <?php foreach ($service->get_service_options() as $name): ?>

          <li class="services-preview__list-item"><?php echo $name; ?></li>
          
        <?php endforeach ?>

      </ul>

    <?php endif; ?>
  </div>
  
</div>