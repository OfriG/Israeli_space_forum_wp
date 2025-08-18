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
.sass('assets/css/style/_main-styles.scss', 'dist/css')
.sass('assets/css/style/_navbar-components.scss', 'dist/css')
.sass('resources/scss/homepage/hero.scss', 'dist/css')

// Disable mix-manifest.json generation
mix.disableNotifications();

// Set public path to theme directory
mix.setPublicPath('./');

mix.version();
