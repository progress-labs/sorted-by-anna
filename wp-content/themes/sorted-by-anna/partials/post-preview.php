<?php
include_once( get_template_directory() . '/functions/random-image.php' );
$placeholder = new Placeholder_Image();
/**
* Post Preview
* @url string
*/

?>


<a href="<?php echo $url; ?>" class="post-preview">
    <div class="post-preview__media-wrap">

        <?php if ( get_the_post_thumbnail( $id ) ) : ?>
            <?php echo get_the_post_thumbnail( $id ); ?>
        <?php else : ?>
            <img class="post-preview__media" src="<?php echo $placeholder->get_image(); ?>" alt="<?php echo $title; ?>">
        <?php endif; ?>

    </div>
    <div class="post-preview__body">
        <div class="post-preview__body-inner">
            <h3 class="post-preview__title"><?php echo $title; ?></h3>
            <?php if ( $date || $category ) : ?>
                <div class="post-preview__meta">
                    <?php if ( $date ) : ?>
                        <span><?php echo $date; ?></span>
                    <?php endif; ?>

                    <?php if ( $category ) : ?>
                        <span><?php echo $category; ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


            <?php if ( $excerpt || $content ) : ?>
                <div class="post-preview__content">
                    <?php
                    if ( $excerpt ) {

                        echo $excerpt;
                    } else if ( $content ) {
                        echo wp_trim_words( $content, 40, '...' );
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( $read_more ) : ?>
                <span class="post-preview__cta">Read More ⟶</span>
            <?php endif; ?>

        </div>


    </div>
</a>
