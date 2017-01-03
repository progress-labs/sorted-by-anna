<?php 

/**
 *
 * Bio Section
 * 
 */

$image_url = get_field( 'bio_image', 'option' )['sizes']['medium'];
$image_alt = str_replace( '-', ' ', get_field( 'bio_image', 'option' )['name'] ); 
?>

<div class="bio">
  <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="bio__img">
  <div class="bio__content">
    <h3 class="bio__content-title">About Anna</h3>
    <?php echo get_field( 'bio_text', 'option' ); ?>
  </div>
</div>