<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <?php wp_head(); ?>

    <script src="https://use.typekit.net/zka5iam.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body <?php body_class(); echo is_front_page() ? '': 'foo'; ?>>
