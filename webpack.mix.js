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
    .sass('resources/sass/pay_method.scss', 'public/css')
    .sass('resources/sass/complete_donate.scss', 'public/css')
    .sass('resources/sass/careful.scss', 'public/css')
    .sass('resources/sass/input_pet_name.scss', 'public/css')
    .sass('resources/sass/show_pet_detail.scss', 'public/css')
    .sass('resources/sass/show_pet.scss', 'public/css')
    .sass('resources/sass/publication_edit.scss', 'public/css')
    .sass('resources/sass/completed_publication.scss', 'public/css')
    .sass('resources/sass/find_help_animal.scss', 'public/css')
    .sass('resources/sass/show_find_animal.scss', 'public/css')
    .sass('resources/sass/edit_find_animal.scss', 'public/css')
    // .sass('resources/sass/map.scss', 'public/css')
    .sass('resources/sass/q_and_a.scss', 'public/css')
    .sass('resources/sass/select2.min.scss', 'public/css')
    .sass('resources/sass/tailwind.min.scss', 'public/css')
    .js('resources/js/stripe.form.js', 'public/js')
    .sourceMaps();
