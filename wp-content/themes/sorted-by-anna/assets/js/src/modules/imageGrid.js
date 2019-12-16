const $ = require('jquery');
import 'featherlight';
import 'featherlight-gallery';

module.exports = function(el) {
  $('.collage__image-wrap').featherlightGallery({
    previousIcon: '←',
    nextIcon: '→',
    galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
    galleryFadeOut: 300          /* fadeOut speed before slide is loaded */
});
}
