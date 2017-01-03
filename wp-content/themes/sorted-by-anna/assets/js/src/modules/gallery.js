
const $ = require('jquery');
import 'detect-swipe';

import featherlight from 'featherlight';
import featherlightGallery from 'featherlight-gallery';


module.exports = function(el) {
  const $el = $(el);

  $el.find('.gallery__item').featherlightGallery({
    previousIcon: '',     /* Code that is used as previous icon */
    nextIcon: '',         /* Code that is used as next icon */
    galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
    galleryFadeOut: 300
  });
}