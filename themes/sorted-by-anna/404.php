<?php


$page_args = [
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'parent' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
];
$pages = get_pages( $page_args );

get_header();

the_partial('nav');
?>


<div class="page-section page-container text-center">
    <h1>Woops! Something is out of place!</h1>
    <p>What you're looking for does not exist or has been moved.</p>
    <p>Maybe try one of these pages?</p>

    <ul>
    <?php foreach ($pages as $page) : ?>
        <li>
            <a class="page-link" href="<?php echo get_post_type_archive_link( 'services' ); ?>"><?php echo $page->post_title; ?></a>
        </li>
        
    <?php endforeach; ?>
    </ul>
    
</div>


<?php 

get_footer();

?>

