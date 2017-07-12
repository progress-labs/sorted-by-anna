<?php


?>

<div class="featured-project">
    <div class="featured-project__primary">
        <div class="featured-project__media-wrap">
            <img class="featured-project__image" src="<?php echo get_the_post_thumbnail_url( $project['id'] );?>" alt="<?php echo get_the_title( $project['id'] );?>">
        </div>
        <?php if ( $project['term'] ) : ?>
        <div class="show-at-small">
            <a class="featured-project__cat-cta" href="<?php echo get_term_link( $project['term']['id'] ); ?>">More <?php echo $project['term']['name']; ?> Projects ⟶</a>
        </div>
        <?php endif; ?>
    </div>

    <a href="<?php echo get_the_permalink( $project['id'] );?>" class="featured-project__content">
        <?php echo $project['content']; ?>
        <span  class="text-link featured-project__cta">View Project ⟶</span>
    </a>

    <?php if ( $project['term'] ) : ?>
    <div class="hide-at-small">
        <a class="btn--centered text-link featured-project__cta--mobile" href="<?php echo get_term_link( $project['term']['id'] ); ?>">More <?php echo $project['term']['name']; ?> Projects ⟶</a>
    </div>
    <?php endif; ?>
</div>
