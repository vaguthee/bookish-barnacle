const mix = require('laravel-mix');

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
mix.combine([
    'node_modules/jquery/dist/jquery.js'
],'public/js/jquery.js');

mix.js('resources/js/editor.js', 'public/js')
    .sass('resources/sass/editor.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/guest.scss', 'public/css');

mix.js('resources/js/dashboard.js', 'public/js'); //app.js alternative for dashboard


mix.js('resources/js/spa.js', 'public/js');

const tailwindcss = require('tailwindcss')

mix.sass('resources/sass/tailwind.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ],
  })

mix.sass('resources/sass/spa.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind-spa.config.js') ],
  })
