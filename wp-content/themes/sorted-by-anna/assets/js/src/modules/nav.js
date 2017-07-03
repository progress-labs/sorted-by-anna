import $ from 'jquery';
import { throttle } from 'lodash';

require('waypoints');
require('waypointsSticky');

module.exports = function(el) {

    
    const $el = $(el),
            $navTrigger = $('.nav-menu'),
            openClass = 'is-open',
            opaqueClass = 'is-opaque',
            NAV_HEIGHT = 70,
            state = {
                isOpen: false
            };


    $navTrigger.on('click', toggleMenuState);

    function toggleMenuState() {
        state.isOpen = !state.isOpen;

        if (state.isOpen) {
            $el.addClass(openClass);
            
        } else {
            $el.removeClass(openClass);
            
        }
    }

    const heroHeight = $('.hero, .page-hero').height() - NAV_HEIGHT;

    $(window).on("scroll", throttle(updateScrollState, 200));

    function updateScrollState() {
        if (  $(document).scrollTop() > heroHeight ) {
            $el.addClass(opaqueClass);
            $el.find('.btn').removeClass('btn--ghost');
        } else {
            $el.removeClass(opaqueClass);
            $el.find('.btn').addClass('btn--ghost');
        }
    }

}




// module.exports = function(el) {
//     var $el = $(el),
//         stuckClass = 'is-stuck',
//         stickOffset = 0;

//     // $(window).on('load', function() {

//     //     if ( window.matchMedia("(min-width: 700px)").matches ) {
//     //         stickOffset = 0;
//     //     } else {
//     //         stickOffset = 158;
//     //     };

//     //     var sticky = new Waypoint.Sticky({
//     //       element: el,
//     //       stuckClass: stuckClass,
//     //       offset: stickOffset
//     //     });
//     // });

// };