let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

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
    .purgeCss({
        whitelistPatterns: [
            /amazon/, /google/, /mobi-asin/, /barnesnoble/, /bookfusion/
        ]
    })
    .version();
