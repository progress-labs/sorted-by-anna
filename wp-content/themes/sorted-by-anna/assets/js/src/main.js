var ComponentRegistry = require('./lib/componentRegistry');

// if using SVG and you require older browser support uncomment below
require('svg4everybody')();


/*-------------------------------------------- */
/** Instantiate Modules */
/*-------------------------------------------- */

var componentRegistry = new ComponentRegistry();

/*
    data-js-component="moduleName" goes on your module's markup
    componentRegistry.registerComponent('moduleName', require('./modules/moduleName'));
*/

componentRegistry.registerComponent('postSlider', require('./modules/postSlider'));
componentRegistry.registerComponent('gallery', require('./modules/gallery'));
componentRegistry.registerComponent('nav', require('./modules/nav'));



componentRegistry.initComponents();
