<?php 
/**
 * Calendly Embed
 */
?>

<div class="calendly">
  <h2>Book A Consultation Now!</h2>
  <iframe src="<?php echo get_field('calendly_url', 'option'); ?>" style="width:100%; height:500px;" frameBorder="0" scrolling="yes"></iframe>
</div>
