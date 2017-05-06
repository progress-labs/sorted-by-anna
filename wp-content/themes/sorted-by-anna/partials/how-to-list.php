<?php
/**
 * How It Works
 */
?>


<?php  if( !empty( $list ) ) : ?>
  <div class="how-it-works">
    <h3 class="section-title"><?php echo $title; ?></h3>

    <ol class="how-it-works__list">
      <?php foreach ( $list as $item ): ?>

        <li class="how-it-works__list-item"><?php echo $list[0]['step']; ?></li>

      <?php endforeach ?>
    </ol>
  </div>
<?php endif;?>
