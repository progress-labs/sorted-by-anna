<?php
require_once( dirname( __FILE__ ) . '/../lib/data/class-post-view-model.php' );

class Portfolio_View_Model extends Post_View_Model {
    
    public function is_grid() {
        return $this->image_grid;
    }

    public function gallery() {

        if ( !$this->gallery_images ) return;

        $gallery = [];


        foreach ($this->gallery_images as $index => $image) {
            $image_url = $image['sizes'];

            $gallery[$index] = [
              'image' => $image_url['large'],
              'image_lg' => $image_url['large'],
              '3x2' => $image_url['3x2'],
              'alt' => $image['alt'] ? $image['alt'] : $image['title']
            ];
        }

        return $gallery;
    }

    public function featured_image() {
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $this->post->ID ), 'portfolio')[0];

        $gallery = $this->gallery();

        if ( $image_url ) {

            return $image_url;

        } elseif ( !empty( $gallery ) ) {

            return array_shift( $gallery );

        } else {

            return false;

        }
    }

    public function post_date() {
        return date( 'F jS, Y', strtotime( $this->post->post_date ) );
    }
}
