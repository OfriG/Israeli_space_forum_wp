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
    .sass('acf-blocks/homepage-hero/homepage-hero.scss', 'dist/css/homepage-hero.css')
    .sass('acf-blocks/iac-block/iac-block.scss', 'dist/css/iac-block.css')
    .sass('resources/scss/footer/_desktop-footer.scss', 'dist/css/footer')
    .sass('resources/scss/footer/_newsletter.scss', 'dist/css/footer')
    .sass('resources/scss/_colors.scss', 'dist/css')
    .sass('resources/scss/_variables.scss', 'dist/css')
    .sass('acf-blocks/joinUs-block/joinUs-block.scss', 'dist/css/joinUs-Block.css')
    .sass('acf-blocks/members-block/members-block.scss', 'dist/css/members-block.css')
    .sass('acf-blocks/AboutUs-hero/AboutUs-hero.scss', 'dist/css/AboutUs-hero.css')
    .sass('acf-blocks/isf-block/isf-block.scss', 'dist/css/isf-block.css')
    .sass('acf-blocks/bannerBlock/bannerBlock.scss', 'dist/css/bannerBlock.css')
    .js('resources/js/newsLetter.js', 'dist/js')
    .js('resources/js/joinUs.js', 'dist/js')




// Disable mix-manifest.json generation
mix.disableNotifications();

// Set public path to theme directory
mix.setPublicPath('./');

mix.version();
