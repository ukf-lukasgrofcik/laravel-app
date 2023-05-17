const mix = require('laravel-mix');

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

mix
    .styles([
        'resources/css/bootstrap.min.css',
        'resources/css/all.min.css',
    ], 'public/css/admin.min.css')
    .scripts([
        'resources/js/jquery-3.7.0.min.js',
        'resources/js/bootstrap.bundle.min.js',
    ], 'public/js/admin.min.js')

    .styles([
        'resources/css/bootstrap.min.css',
    ], 'public/css/auth.min.css')
    .scripts([
        'resources/js/bootstrap.bundle.min.js',
    ], 'public/js/auth.min.js')

    .styles([
        'resources/css/bootstrap.min.css',
    ], 'public/css/style.min.css')
    .scripts([
        'resources/js/bootstrap.bundle.min.js',
    ], 'public/js/style.min.js');
