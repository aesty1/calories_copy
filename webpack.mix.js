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
mix.js('resources/js/script.js', 'public/resources/js')
mix.js('resources/js/activities-sctipt.js', 'public/resources/js')
mix.js('resources/js/find-products.js', 'public/resources/js')
mix.js('resources/js/api-service.js', 'public/resources/js')
mix.styles([
    'resources/css/style.css',
], 'public/resources/css/style.css');

mix.copyDirectory('resources/img', 'public/resources/img');
