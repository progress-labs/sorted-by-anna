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
                <h4 class="site-footer__col-title">Social</h4>
                <div class="social-links">
                    <a href="<?php echo get_field( 'email', 'option' ); ?>" class="social-links__item">
                        <?php svg_icon( 'email', 24, 24); ?>
                        <span class="social-links__text">anna[at]sortedbyanna[dot]com</span>
                    </a>
                    <a href="<?php echo get_field( 'instagram', 'option' ); ?>" class="social-links__item">
                        <?php svg_icon( 'instagram', 24, 24); ?>
                        <span class="social-links__text">@sortedbyanna</span>
                    </a>
                    <a href="<?php echo get_field( 'twitter', 'option' ); ?>" class="social-links__item">
                        <?php svg_icon( 'twitter', 24, 24); ?>
                        <span class="social-links__text">@sortedbyanna</span>
                    </a>
                </div>
            </div>
            <div class="col page-col">
                <h4 class="site-footer__col-title" >Pages</h4>
                <ul class="footer-links">
                    <?php foreach ($pages as $page) : ?>
                        <li class="footer-links__item">
                            <a class="footer-links__link" href="<?php echo get_permalink( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col project-col">
                <h4 class="site-footer__col-title" >Projects</h4>
                <ul class="footer-links">
                    <?php foreach ($terms as $term) : ?>
                        <li class="footer-links__item">
                            <a class="footer-links__link" href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?> Projects</a>
                        </li>
                    <?php endforeach; ?>
                        <li class="footer-links__item">
                            <a class="footer-links__link" href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">See All Projects</a>
                        </li>
                </ul>
            </div>
            <div class="col book-col">
                <a href="<?php echo get_field( 'calendly_url', 'option' ) ; ?>" class="btn btn--dark">Book a Free Consultation</a>
            </div>
        </div>
    </div>


  <div class="copyright">Sorted By Anna &copy; <?php echo date('Y'); ?></div>
</footer>
