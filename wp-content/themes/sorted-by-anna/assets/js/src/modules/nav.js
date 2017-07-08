import $ from 'jquery';
import { throttle } from 'lodash';

module.exports = function(el) {

    const $el = $(el),
            $navTrigger = $('.nav-menu'),
            openClass = 'is-open',
            opaqueClass = 'is-opaque',
            NAV_HEIGHT = 70,
            HERO_HEIGHT = $('.hero').height() - NAV_HEIGHT || false,
            mql = window.matchMedia('(min-width: 768px)'),
            state = {
                isOpen: false
            };

    let heroHeight = HERO_HEIGHT;

    function toggleMenuState() {
        state.isOpen = !state.isOpen;

        if (state.isOpen) {
            openMenu();
        } else {
            closeMenu();
            
        }
    }

    const checkIfHeroExists = () => {
        if ( !heroHeight ) {
            $el.addClass(opaqueClass);
            $el.find('.btn').removeClass('btn--ghost');
        }
        return false;
    }

    function openMenu() {
        state.isOpen = true;
        $el.addClass(openClass);
        $navTrigger.addClass('is-open');
    }

    function closeMenu() {
        state.isOpen = false;
        $el.removeClass(openClass);
        $navTrigger.removeClass('is-open');
    }

    const scrollListener = () => {
        // must invoke!
        // In order to run throttle
        throttle(updateScrollState, 200)();
    }

    const removeDesktopEventListeners = () => {
        $(window).off('scroll', scrollListener);
        $(window).off('resize', setHeroHeight);
    }

    const addDesktopEventListeners = () => {
        if ( !heroHeight ) return;
        $(window).on('scroll', scrollListener);
        $(window).on('resize', setHeroHeight);
    }

    const updateScrollState = () => {
        
        if ( $(document).scrollTop() > heroHeight ) {
            $el.addClass(opaqueClass);
            $el.find('.btn').removeClass('btn--ghost');
        } else {
            $el.removeClass(opaqueClass);
            $el.find('.btn').addClass('btn--ghost');
        }
    }

    const setHeroHeight = () => {
        heroHeight = $('.hero').height() - NAV_HEIGHT || 0;
    }

    if (mql.matches) {
        addDesktopEventListeners();
    } else {
        closeMenu();
    }

    mql.addListener(function(data){
        if (data.matches) {
            addDesktopEventListeners();
        } else {
            removeDesktopEventListeners();
            closeMenu();
        }
    });


    checkIfHeroExists();
    $navTrigger.on('click', toggleMenuState);
}