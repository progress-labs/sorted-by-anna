<?php
if ( !isset( $text ) ) $text = false;
?>

<div class="consultation-cta <?php echo $has_bg ? 'consultation-cta--bg' : ''; ?> ">
  <h2 class="consultation-cta__title">
    <?php 
      if ( $text ) {
      echo $text;
      } else {
       echo 'Let\'s make your house a home';
      } 
    ?>
  </h2>
  <a href="<?php echo get_field('url', 'option'); ?>" class="btn btn--dark">Book a Free Consultation Now</a>
</div>
