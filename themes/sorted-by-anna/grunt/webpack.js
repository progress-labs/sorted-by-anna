var path = require('path'),
    webpack = require('webpack'),
    config = require('./_config'),
    _ = require('lodash');

/**
 * Shared props between dev/production
 * @type {{output: {filename: string, chunkFilename: string}}}
 */
var shared = {
    output: {
        filename: '[name].bundle.js',
        chunkFilename: '[chunkhash].js'
    }
};

/**
 * Configuration for Webpack. See all available options here: https://webpack.github.io/docs/configuration.html
 */
module.exports = {
    // shared options between targets
    options: {
        context: path.join(config.paths.js, 'src'),
        entry: {
            main: './main.js',
            /**
             * Any vendor libraries used should be added to a vendor bundle. Each lib module name should be added
             * to the below array.
             */

            // to the below array.
            vendor: ['slick', 'featherlight', 'featherlight-gallery', 'detect-swipe']
        },
        resolve : {
            alias: {
              slick: path.join(__dirname, '../node_modules/slick-carousel/slick/slick.min.js'),
              featherlight: path.join(__dirname, '../node_modules/featherlight/release/featherlight.min.js'),
              'featherlight-gallery': path.join(__dirname, '../node_modules/featherlight/release/featherlight.gallery.min.js'),
              'detect-swipe': path.join(__dirname, '../assets/js/lib/detect-swipe.min.js')
            }
        },
        module: {
            loaders: [
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    loader: 'babel',
                    cacheDirectory: true,
                    query: {
                        presets: ['es2015']
                    }
                }
            ]
        },
        plugins: [
            new webpack.optimize.CommonsChunkPlugin('vendor', 'vendor.bundle.js'),
            new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            "window.jQuery": "jquery"
            })
        ]
    },

    dev: {
        watch: true,
        debug: true,
        devtool: '#source-map',
        output: _.assign({}, shared.output, {
            path: path.join(config.paths.js, 'built')
        })
    },

    prod: {
        output: _.assign({}, shared.output, {
            path: path.join(config.paths.js, 'dist')
        }),

        plugins: [
            new webpack.optimize.UglifyJsPlugin({
                compress: {
                    drop_console: true
                }
            })
        ]
    }
};
