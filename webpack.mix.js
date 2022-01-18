const mix = require('laravel-mix');

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

mix.styles([
    'resources/views/site/css/app.css',
], 'public/site/css/app.css')


.scripts([
    'resources/views/site/js/app.js',
], 'public/site/js/app.js')

mix.styles([
    'resources/views/admin/css/app.css',
], 'public/admin/css/app.css')


.scripts([
    'resources/views/admin/js/app.js',
], 'public/admin/js/app.js')

.version();
