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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .sass('resources/sass/app.scss', 'public/css');
    //.copy('resources/sass/login.css', 'public/css/login.css')
    //.copy('node_modules/font-awesome/fonts', 'public/fonts')
    //.copy('node_modules/font-awesome/css/font-awesome.css', 'public/css');
