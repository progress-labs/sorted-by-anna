import $ from 'jquery';
import imagesLoaded from 'imagesloaded';
import Masonry from 'masonry-layout';

module.exports = function(el) {
    const col = document.querySelectorAll('.col');

    console.log(col.length);
    // if (col.length !> 3) return;

    el.style.minHeight = '700px';

    var msnry = new Masonry( el, {
        percentPosition: true,
        itemSelector: '.col',
        initLayout: false,
        gutter: '.gutter'
        
    });

    imagesLoaded(el, function() {
        msnry.layout();
    });



}