const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .styles(['resources/css/bootstrap-reboot.min.css',
    'resources/css/bootstrap-grid.min.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/slider-radio.css',
    'resources/css/select2.min.css',
    'resources/css/magnific-popup.css',
    'resources/css/plyr.css',
    'resources/css/main.css',
    'resources/css/container.css',
], 'public/css/app.css')
    .version();
