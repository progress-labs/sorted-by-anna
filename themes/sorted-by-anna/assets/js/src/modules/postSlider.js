var $ = require('jquery');

import slick from 'slick-carousel';

module.exports = function(el) {
  const $el = $(el);

  $el.slick({
    dots: true,
    slidesToShow: 1,
      slidesToScroll: 1,
  });
}
