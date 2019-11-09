<?php

/**
 * Services Card
 */
 include_once( get_template_directory() . '/functions/random-image.php' );
 $placeholder = new Placeholder_Image();


if ( !isset( $is_centered ) ) $is_centered = false;
if ( !isset( $is_small ) ) $is_small = false;
if ( !isset( $link ) ) $link = false;

?>

<div class="service-card <?php echo $is_centered ? 'service-card--centered' : ''; echo $is_small ? ' service-card--small' : '';?>">
    <?php if ( $link ) : ?>
        <a href="<?php echo $link; ?>" class="service-card__name"><?php echo $title; ?></a>
    <?php else : ?>
        <h2 class="service-card__name"><?php echo $title; ?></h2>
    <?php endif; ?>
    
    <div class="service-card__content">
        <?php if ( !empty ( $list )) : ?>
            <ul>
                <?php foreach($list as $item ) :?>
                    <li><?php echo $item['name']; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        <?php if ( $link ) : ?>
            <a href="<?php echo $link; ?>" class="service-card__link">Learn More →</a>
        <?php endif; ?>
    </div>
</div>
