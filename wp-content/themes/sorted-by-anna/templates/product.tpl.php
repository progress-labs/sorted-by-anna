<?php

/**
* Template Name: Product Page
*/

include_once( get_template_directory() . '/functions/lib/data/class-post-view-model.php' );

global $post;

$products = array_map(function( $product ) {
    return [
        'title' => $product->post_title,
        'image' => get_the_post_thumbnail_url( $product->ID ),
        'url' => get_field( 'product_link',  $product->ID )
    ];
}, get_field( 'products' ));

get_header();

the_partial('nav');
?>

<main>

    <?php the_partial( 'hero', [
        'image' => get_the_post_thumbnail_url( $post->ID ),
        'title' => get_the_title(),
        'media' => false
    ]); ?>

    <div class="page-container">
        <?php if ( have_posts() ) : ?>
            <section class="page-section page-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php if ( !empty( $products ) ) : ?>
            <div class="grid grid-4-up grid--small">
                <?php foreach ($products as $product) : ?>
                    <div class="col text-center">
                        <a class="product-block" href="<?php echo $product['url']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
                            <h6 class="product-block__title"><?php echo $product['title']; ?></h6>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
