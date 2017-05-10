<?php
/**
 * Base index file for the template
 */
get_header();
the_post();

the_partial( 'page-hero', [
    'title' => get_the_title()
    ]);


$args = array(
	'post_type' => 'service'
);

$services_query = new WP_Query( $args );


?>

<section class="page-section page-content">
        <?php the_content(); ?>
</section>

<section class="page-section">
    <?php if ( $services_query->have_posts() ) :  ?>
        <div class="grid grid-3-up">
        <?php while( $services_query->have_posts() ) : $services_query->the_post(); ?>
            <div class="col">
                <?php the_partial( 'services-card', [
                        'service' => $post
                    ]);
                ?>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>


</section>

<section class="page-section">
    <?php the_partial('callout', [
        'text' => 'Find out which service sorts you best',
        'btn' => [
            'url' => '#',
            'text' => 'Book A Consultation Now'
        ]
    ]); ?>
</section>

<section class="page-section">
    <?php the_partial('testimonials'); ?>
</section>

<section class="page-section">
    <?php the_partial('section-title', [
        'title' => 'How It Works'
    ]); ?>

    <div class="how-it-works">
        <ol class="how-it-works__list">
            <li class="how-it-works__list-item">Book your free consultation to discuss your space and challenges.</li>
            <li class="how-it-works__list-item">List Item 2</li>
            <li class="how-it-works__list-item">List Item 3</li>
            <li class="how-it-works__list-item">List Item 4</li>
        </ol>
    </div>
</section>

<section class="page-section">

    <div class="grid grid-3-up">
        <div class="col">
            <?php the_partial('post-preview', [
                'url' => '#',
                'img' => 'http://placehold.it/400x300',
                'title' => '2 Years Being A Boss Lady',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'excerpt' => 'A reflection on the last two years running a business as a solo entreprenuer.'

            ]); ?>


        </div>

        <div class="col">
            <?php the_partial('post-preview', [
                'url' => '#',
                'img' => 'http://placehold.it/400x300',
                'title' => 'Startup Office Gets Redesign',
                'excerpt' => false,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ]); ?>
        </div>

        <div class="col">
            <?php the_partial('post-preview', [
                'url' => '#',
                'img' => 'http://placehold.it/400x300',
                'title' => 'Playroom Must Have Solutions',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'content' => false
            ]); ?>
        </div>
    </div>


</section>


<section class="page-section">
    <div class="color-block">
        <div class="color-block__image">
            <img src="http://placehold.it/500x600" alt="">
        </div>

        <div class="color-block__inner">
            <div class="color-block__content">
                <h3 class="color-block__title">Some kind of title here</h3>
                <div class="color-block__text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>

    </div>

    <div class="color-block">
        <div class="color-block__image">
            <img src="http://placehold.it/500x600" alt="">
        </div>

        <div class="color-block__inner">
            <div class="color-block__content">
                <h3 class="color-block__title">Some kind of title here</h3>
                <div class="color-block__text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>

    </div>
</section>

<section class="page-section">
    <?php the_partial('section-title', [
        'title' => 'Press'
    ]); ?>
    <div class="grid grid-4-up">
        <div class="col">
            <a href="#" class="press">
                <img src="http://placehold.it/200x50" alt="">
                <div class="press__overlay">
                    <h3 class="press__title">Article Title!</h3>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="press">
                <img src="http://placehold.it/200x50" alt="">
                <div class="press__overlay">
                    <h3 class="press__title">Article Title!</h3>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="press">
                <img src="http://placehold.it/200x50" alt="">
                <div class="press__overlay">
                    <h3 class="press__title">Article Title!</h3>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="#" class="press">
                <img src="http://placehold.it/200x50" alt="">
                <div class="press__overlay">
                    <h3 class="press__title">Article Title!</h3>
                </div>
            </a>
        </div>
    </div>
</section>


<?php
get_footer(); ?>
