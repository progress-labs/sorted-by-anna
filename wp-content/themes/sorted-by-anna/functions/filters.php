<?php

/**
 * Filters
 */


add_filter( 'excerpt_length', function( $length ){
      return 30;
}, 999 );

add_filter('excerpt_more', function() {
  return '...';
});

add_filter( 'gform_form_tag', function( $form_tag, $form ) {
    $form_tag = preg_replace( '/>/', 'class="sba-form">', $form_tag );

    return $form_tag;

}, 10, 2);

add_filter( 'gform_pre_render', function( $form ) {

    foreach ( $form['fields'] as $f => $field ) {
            $form['fields'][$f]['cssClass'] .= 'sba-form-field sba-form-type-' . $field['type'];
        }

    return $form;
});

add_filter('the_content', function( $content ) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 sba-image"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
});

add_filter('the_content', function( $content ){
  // match any iframes
  $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
  preg_match_all($pattern, $content, $matches);
  foreach ($matches[0] as $match) {
      // wrap matched iframe with div
      $wrappedframe = '<div class="responsive-embed">' . $match . '</div>';
      //replace original iframe with new in content
      $content = str_replace($match, $wrappedframe, $content);
  }
  return $content;
});