<?php 
require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Portfolio_View_Model extends Post_View_Model {

    public function gallery() {

      $gallery = [];

      if ( !$this->gallery_images ) return;

      foreach ($this->gallery_images as $index => $image) {
        $image_url = $image['image']['sizes']['gallery_preview'];

        $title = $image['image']['title'];
        
        $gallery[$index] = [
          'image' => $image['image']['sizes']['gallery_preview'],
          'image_lg' => $image['image']['sizes']['large'],
          'alt' => $image['image']['title']
        ];
      }

      return $gallery;
    }

    public function featured_image() {
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $this->post->ID ), 'portfolio')[0];

      $gallery_image = array_shift( $this->gallery() );

      if ( $image_url ) {
        return $image_url;
      } else if ( $gallery_image ) {
        return $gallery_image;
      } else {
        return false;
      }
    }
    
}