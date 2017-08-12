<?php 

class Placeholder_Image {
    public static $images = [
        '/assets/img/pattern-bg-1.jpg',
        '/assets/img/pattern-bg-2.jpg',
        '/assets/img/pattern-bg-3.jpg',
        '/assets/img/pattern-bg-4.jpg',
        '/assets/img/pattern-bg-5.jpg',
        '/assets/img/pattern-bg-6.jpg',
        '/assets/img/pattern-bg-7.jpg',
        '/assets/img/pattern-bg-8.jpg',
        '/assets/img/pattern-bg-9.jpg'
    ];

    public function get_image() {  
        return get_template_directory_uri() . self::$images[rand( 0, count( self::$images ) - 1 ) ];
    }
}