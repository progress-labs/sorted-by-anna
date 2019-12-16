<?php

$page_args = [
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'parent' => 0,
	'post_type' => 'page',
	'post_status' => 'publish',
    'exclude' => get_option( 'page_on_front' )
];
$pages = get_pages( $page_args );


$terms = get_terms( [
    'taxonomy' => 'services',
    'hide_empty' => true,
    'number' => 5
]);

?>

<footer class="site-footer">
    <div class="page-container">
        <div class="grid grid--no-max grid-4-col jb">
            <div class="col social-col">
                <h4 class="site-footer__col-title">Contact</h4>
                <div class="social-links">
                    <a href="<?php echo get_field('url', 'option'); ?>" class="social-links__item">
                        <?php svg_icon( 'email', 24, 24); ?>
                        <span class="social-links__text">anna[at]sortedbyanna[dot]com</span>
                    </a>
                    <a href="<?php echo get_field( 'instagram', 'option' ); ?>" class="social-links__item">
                        <?php svg_icon( 'instagram', 24, 24); ?>
                        <span class="social-links__text">@sortedbyanna</span>
                    </a>
                </div>
            </div>

            <div class="col book-col">
                <a href="<?php echo get_field('url', 'option'); ?>" class="btn btn--dark">Book a Free Consultation</a>
            </div>
        </div>
    </div>


  <div class="copyright">Sorted By Anna &copy; <?php echo date('Y'); ?></div>

  <?php
    the_partial('analytics');

    wp_footer();
  ?>
</footer>
