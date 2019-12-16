<div class="color-block">
    <div class="color-block__image" style="background-image: url(<?php echo $image; ?>)"></div>
    <div class="color-block__inner">

        <div class="color-block__content">
            <h3 class="color-block__title"><?php echo $title; ?></h3>
            <p><?php echo $description; ?></p>
            <?php if ( $list ) : ?>
              <ul class="color-block__list">
                <?php foreach ($list as $item) : ?>
                   <li><?php echo $item['name']; ?>
                <?php endforeach; ?>  
              </ul>
            <?php endif; ?>
        </div>
    </div>
</div>