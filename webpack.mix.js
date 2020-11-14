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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/owl-carousel.js', 'public/js')
    .js('resources/js/dashboard/app.js', 'public/js/dashboard')
    .sass('resources/sass/dashboard/theme.scss', 'public/css/dashboard')
    .sass('resources/sass/app.scss', 'public/css/dashboard')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/owl-carousel.scss', 'public/css')
    .purgeCss()
    // .postCss('resources/css/app.css', 'public/css', [
    //     require('postcss-import'),
    //     require('tailwindcss'),
    // ]);