<?php 

/**
 * Badge Section
 */
 ?>

<section class="badge-section">
<?php if( have_rows('badges') ): while( have_rows('badges') ) : the_row();
?>

  <?php if ( !empty( get_sub_field( 'badge_url') ) ) : ?>
    <a class="badge-section__item badge" href="<?php echo get_sub_field( 'badge_url'); ?>">
  <?php else : ?>
    <div class="badge-section__item badge">
  <?php endif; ?>

    <img src="<?php echo get_sub_field( 'badge_image')['sizes']['medium']; ?>" alt="<?php echo str_replace( '-', ' ', get_sub_field('badge_image')['title'] ); ?>">

  <?php if ( !empty( get_sub_field( 'badge_url') ) ) : ?>
    </a>
  <?php else : ?>
    </div>
  <?php endif; ?>

<?php 
endwhile; 
endif;
?>
</section>