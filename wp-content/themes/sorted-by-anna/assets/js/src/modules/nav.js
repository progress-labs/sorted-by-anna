var $ = require('jquery');

module.exports = function(el) {
    const $el = $(el),
            $navTrigger = $('.nav-menu'),
            openClass = 'is-open',
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
}
