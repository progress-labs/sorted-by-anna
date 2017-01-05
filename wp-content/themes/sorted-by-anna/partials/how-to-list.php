<?php 
/**
 * How To List
 */
?>


<?php  if( !empty( $list ) ) : ?>
  <div class="how-to-list">
    <h3><?php echo $title; ?></h3>
    
    <ol class="custom-numbered-list">
      <?php foreach ( $list as $item ): ?>

        <li><?php echo $list[0]['step']; ?></li>
        
      <?php endforeach ?>
    </ol>
  </div>
<?php endif;?>