<?php
/**
 * How It Works
 */
?>


<?php  if( !empty( $list ) ) : ?>
    <div class="page-container">
        <div class="how-it-works">
            <?php the_partial( 'section-title', [
               'title' => $title
            ]); ?>

          <ol class="how-it-works__list">
            <?php foreach ( $list as $item ): ?>
              <li class="how-it-works__list-item"><?php echo $item['text']; ?></li>
            <?php endforeach ?>
          </ol>
        </div>
    </div>
<?php endif;?>
