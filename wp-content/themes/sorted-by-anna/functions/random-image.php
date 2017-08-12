<?php 

class Placeholder_Image {
    public static $images = [
        'http://placehold.it/400x300/eeeddd/fff',
        'http://placehold.it/400x300/34edac/fff',
        'http://placehold.it/400x300/aaaeee/fff',
        'http://placehold.it/400x300/a34fde/fff',
        'http://placehold.it/400x300/12ecd3/fff'
    ];

    public function get_image() {  
        return self::$images[rand( 0, count( self::$images ) - 1 ) ];
    }
}