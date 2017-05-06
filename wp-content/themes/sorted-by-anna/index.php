<?php
/**
 * Base index file for the template
 */
get_header(); ?>

<?php

the_post(); ?>

<?php the_partial( 'page-hero', [
    'title' => get_the_title()
    ]);
?>

<section>
    <?php the_partial( 'services-card', [
            'title' => 'Office / Paper',
            'content' => 'Not sure what solutions would work for you? Overwhelmed by shopping or even stepping foot inside the Container Store? Working with a professional organizer takes the guessing and stress out of shopping. With years of experience in finding the perfect solutions for each clients space, using our shopping services creates a unique experience catered to your life, taste and budget.'
        ]);
    ?>

    <?php the_partial( 'services-card', [
            'title' => 'Moving / Relocation',
            'content' => 'You can decide whether you want to tackle just your bedroom closets, your kids play room/area, or you entire home. Our home services cater to what you want to see organized first. We start by working together to sort through your belongings and gently ease into dividing pieces into keep, donate, sell and trash piles. Then I get to work putting everything back together in an organized way that not only looks good but will be easy for you to maintain long after I am gone.'
        ]);
    ?>
</section>

<section>
    <?php the_partial('callout', [
        'text' => 'Find out which service sorts you best',
        'btn' => [
            'url' => '#',
            'text' => 'Book A Consultation Now'
        ]
    ]); ?>
</section>

<section>
    <?php the_partial('testimonials'); ?>
</section>

<section>
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


<!-- <main>
  <div class="page-container">


    <div class="content-wrap">
      <div class="page-content">

        <?php the_content(); ?>

      </div>
    </div>

  </div>
</main> -->

<?php
get_footer(); ?>
