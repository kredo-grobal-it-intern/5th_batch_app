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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/stripe_form.scss', 'public/css')
    .sass('resources/sass/q_and_a.scss', 'public/css')
    .sass('resources/sass/map.scss', 'public/css')
    .js('resources/js/stripe.form.js', 'public/js')
    .sourceMaps();
