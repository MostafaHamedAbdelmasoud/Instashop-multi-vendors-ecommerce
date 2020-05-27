const mix = require('laravel-mix'),
    WebpackRTLPlugin = require('webpack-rtl-plugin');

require('laravel-mix-merge-manifest');
mix.mergeManifest();

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

mix.copyDirectory('node_modules/admin-lte/dist/img', 'public/images');

mix.js('Modules/Dashboard/Resources/assets/js/adminlte.js', 'public/js')
   .sass('Modules/Dashboard/Resources/assets/sass/adminlte.scss', 'public/css');

mix.js('Modules/Dashboard/Resources/assets/js/auth.js', 'public/js')
   .sass('Modules/Dashboard/Resources/assets/sass/auth.scss', 'public/css');

// Handle rtl
mix.webpackConfig({
    plugins: [
        new WebpackRTLPlugin({
            diffOnly: false,
            minify: true,
        }),
    ],
});

mix.version([
    'public/js/*',
    'public/css/*',
    'public/css/adminlte.rtl.css',
    'public/css/auth.rtl.css',
]);
