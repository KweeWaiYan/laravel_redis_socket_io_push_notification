let mix = require('laravel-mix');

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

//mix.js('resources/js/app.js', 'public/js')
mix.react('resources/js/front/app.js', 'public/js/front/')
    .react('resources/js/dashboard/app.js', 'public/js/dashboard/')
    .sass('resources/sass/front/app.scss', 'public/css/front/')
    .sass('resources/sass/dashboard/app.scss', 'public/css/dashboard/')
    .mix.version() // enabling verion for dev and prod
    .mix.webpackConfig({ // enabling js and scss files mapping 
        devtool: 'source-map'
    }).sourceMaps();

//if (mix.inProduction()) {
//    mix.version();
//}
//
//if (!mix.inProduction()) {
//    mix.webpackConfig({
//        devtool: 'source-map'
//    })
//    .sourceMaps()
//}

