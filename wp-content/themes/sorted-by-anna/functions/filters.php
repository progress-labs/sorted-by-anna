<?php

/**
 * Filters
 */


function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('excerpt_more', function() {
  return '...';
});

add_filter( 'wpcf7_form_class_attr', function( $class ) {

  $class .= ' form';

  return $class;
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

function my_image_class_filter($classes) {
	return $classes . ' another-image-class';
}
add_filter('get_image_tag_class', function( $classes ){
    return $classes . ' sba-image';
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
