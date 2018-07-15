<?php 
require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Services_View_model extends Post_View_Model {

  public function get_service_options() {
      
      if ( $this->service_types ) {
        $service_names = [];

        foreach ($this->service_types as $value) {

          $services_names[] = $value['name'];   

        }

        return $services_names;

      }  else {
        return false;
      }
  }

  public function get_featured_thumbnail_url($size) {
    return wp_get_attachment_image_src( get_post_thumbnail_id( $this->post->ID ), $size)[0];
  }

  public function get_badges() {

    var_dump($this->badges);

  }
    
}