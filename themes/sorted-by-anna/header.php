<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />

    <meta name="author" content="Anna Bauer" />
    <meta name="contact" content="anna@sortedbyanna.com" />
    <meta name="copyright" content="Copyright (c)<?php echo date('Y'); ?> Anna Bauer. All Rights Reserved." />
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="keywords" content="stories, tales, harriet, smith, harriet smith, storytelling, day, life, dog, birth, puppies, happy" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#a3dbce">
    <meta name="theme-color" content="#ffffff">


    <?php
        $page_image = 'hello!';
    ?>
    <!-- Twitter Tags -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@nytimesbits" />
    <meta name="twitter:creator" content="@sortedbyanna" />
    <meta property="og:url" content="<?php echo the_permalink(); ?>" />
    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:image" content="<?php echo $page_image; ?>" />

    <!-- Facebook -->
    <meta property="og:url" content="<?php echo the_permalink(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:image" content="<?php echo $page_image; ?>" />

    <?php wp_head(); ?>

    <script src="https://use.typekit.net/zka5iam.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body <?php body_class(); ?>>
