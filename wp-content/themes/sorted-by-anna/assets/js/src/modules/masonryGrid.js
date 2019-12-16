import $ from 'jquery';
import imagesLoaded from 'imagesloaded';
import Masonry from 'masonry-layout';

module.exports = function(el) {
    const col = document.querySelectorAll('.col'),
          mql = window.matchMedia("(min-width: 768px)");

    // Ensure container is tall enough
    // For at least one element. 
    el.style.minHeight = '700px';

    var masonry = new Masonry( el, {
        percentPosition: true,
        itemSelector: '.col',
        initLayout: false,
        gutter: '.gutter'
        
    });

    imagesLoaded(el, function() {
        masonry.layout();
    });

}