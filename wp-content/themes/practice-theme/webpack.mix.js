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

mix.js('resources/js/app.js', 'dist/js')
    .js('resources/js/header.js', 'dist/js')
    .sass('resources/scss/_main-styles.scss', 'dist/scss')
    .sass('resources/scss/_navbar-components.scss', 'dist/scss')
    .sass('resources/scss/_footer.scss', 'dist/scss')

// Disable mix-manifest.json generation
mix.disableNotifications();

// Set public path to theme directory
mix.setPublicPath('./');

mix.version();
