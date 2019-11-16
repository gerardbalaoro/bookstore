let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'js/app.js')
    .combine([
        'resources/js/plugins/jcarousel.min.js',
        'resources/js/plugins/jcarousel.control.js',
        'resources/js/plugins/jcarousel.autoscroll.js',
        'resources/js/plugins/jcarousel.pagination.js',
    ], 'public/js/jcarousel.js')
    .combine([
        'resources/js/plugins/imglazyload.js',
        'resources/js/plugins/magnific-popup.min.js',
    ], 'public/js/plugins.js')
    .combine(['resources/js/plugins/jquery.min.js'], 'public/js/jquery.js')
    .postCss('resources/css/app.css', 'css/app.css', [
        tailwindcss('tailwind.config.js')
    ])
    .version();
