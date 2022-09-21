const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.js('resources/js/app.js', 'public/js').vue()
 .sass('resources/sass/app.scss', 'public/css').options({
     processCssUrls: false
 }).sass('resources/sass/tailwind.scss', 'public/css').options({
     postCss: [tailwindcss('./tailwind.config.js')],
     processCssUrls: false
 });

mix.copy('vendor/proengsoft/laravel-jsvalidation/resources/views', 'resources/views/vendor/jsvalidation')
.copy('vendor/proengsoft/laravel-jsvalidation/public', 'public/vendor/jsvalidation');