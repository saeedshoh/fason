const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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
// .postCss('resources/css/app.css', 'public/css', [

// ]);

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/dashboard/app.js', 'public/js/dashboard')
    .sass('resources/sass/app.scss', 'public/css/dashboard')
    .sass('resources/sass/dashboard/theme.scss', 'public/css/dashboard')
    .purgeCss()