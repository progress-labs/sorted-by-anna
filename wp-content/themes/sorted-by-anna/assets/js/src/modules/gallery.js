const $ = require('jquery');
import 'slick-carousel';
import 'featherlight';
import 'featherlight-gallery';

module.exports = function(el) {
  const $el = $(el);

  $el.slick();
}
