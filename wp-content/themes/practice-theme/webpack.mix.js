let mix = require('laravel-mix');
const fs = require('fs');

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

mix.sass('resources/scss/_main-styles.scss', 'dist/css')
    .sass('resources/scss/_navbar-components.scss', 'dist/css')
    .sass('resources/scss/_footer.scss', 'dist/css')
<<<<<<< HEAD
    .sass('acf-blocks/homepage-hero/homepage-hero.scss', 'dist/css/homepage-hero.css')
    .sass('acf-blocks/impactBanner/_impactBanner.scss', 'dist/css/impactBanner.css')
=======

    .sass('acf-blocks/homepage-hero/homepage-hero.scss', 'dist/css/homepage-hero.css')
>>>>>>> b40dea448ff100bced5723f80f8cec740001827e

    .sass('resources/scss/footer/_desktop-footer.scss', 'dist/css/footer')
    .sass('resources/scss/footer/_newsletter.scss', 'dist/css/footer')
    .sass('resources/scss/_colors.scss', 'dist/css')
    .sass('resources/scss/_variables.scss', 'dist/css')
    .js('resources/js/newsLetter.js', 'dist/js')




// Disable mix-manifest.json generation
mix.disableNotifications();

// Set public path to theme directory
mix.setPublicPath('./');

mix.version();
