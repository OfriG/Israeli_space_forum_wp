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
    .sass('resources/scss/_fonts.scss', 'dist/css')
    .sass('acf-blocks/homepage-hero/homepage-hero.scss', 'dist/css/homepage-hero.css')
    .sass('acf-blocks/iac-block/iac-block.scss', 'dist/css/iac-block.css')
    .sass('resources/scss/footer/_desktop-footer.scss', 'dist/css/footer')
    .sass('resources/scss/footer/_newsletter.scss', 'dist/css/footer')
    .sass('resources/scss/_colors.scss', 'dist/css')
    .sass('resources/scss/_variables.scss', 'dist/css')
    .sass('acf-blocks/joinUs-block/joinUs-block.scss', 'dist/css/joinUs-block.css')
    .sass('acf-blocks/members-block/members-block.scss', 'dist/css/members-block.css')
    .sass('acf-blocks/AU-team-block/team-block.scss', 'dist/css/team-block.css')
    .sass('acf-blocks/impact-block/impact-block.scss', 'dist/css/impact-block.css')
    .sass('acf-blocks/aboutUs-bannerBlock/aboutUs-banner.scss', 'dist/css/aboutUs-banner.css')
    .sass('acf-blocks/AboutUs-hero/AboutUs-hero.scss', 'dist/css/AboutUs-hero.css')
    .sass('acf-blocks/isf-block/isf-block.scss', 'dist/css/isf-block.css')
    .sass('acf-blocks/bannerBlock/bannerBlock.scss', 'dist/css/bannerBlock.css')
    .sass('acf-blocks/companies-block/companies-block.scss', 'dist/css/companies-block.css')
    .sass('acf-blocks/IAC/hero/hero-block.scss', 'dist/css/hero-block.css')
    .sass('acf-blocks/mission-Intro-block/mission-intro-block.scss', 'dist/css/mission-intro-block.css')
    .sass('acf-blocks/AU-missionBlock/missionBlock.scss', 'dist/css/missionBlock.css')
    .sass('acf-blocks/innerCompany-block/innerCompany-block.scss', 'dist/css/innerCompany-block.css')
    .sass('resources/scss/404.scss', 'dist/css/404.css')
    .sass('acf-blocks/artist-block/artist-block.scss', 'dist/css/artist-block.css')
    .sass('acf-blocks/contactUs-block/contactUs-block.scss', 'dist/css/contactUs-block.css')
    .js('resources/js/newsLetter.js', 'dist/js')
    .js('resources/js/joinUs.js', 'dist/js')
    .js('acf-blocks/contactUs-block/contactUs.js', 'dist/js')
    .js('resources/js/global-contact-popup.js', 'dist/js')
    .js('resources/js/header.js', 'dist/js')

mix.copyDirectory('resources/fonts', 'dist/fonts');

// Disable mix-manifest.json generation
mix.disableNotifications();

// Set public path to theme directory
mix.setPublicPath('./');

mix.options({
    processCssUrls: false
});

mix.version();
