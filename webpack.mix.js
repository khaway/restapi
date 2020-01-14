const mix = require('laravel-mix');
const glob = require('glob-all');
require('laravel-mix-purgecss');
let tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Set mix options
 |--------------------------------------------------------------------------
 |
 | Here we disable processing css urls, including some postCss plugins.
 |
 */

mix.options({
    processCssUrls: false,
    postCss: [tailwindcss('tailwind.config.js')]
})

/*
 |--------------------------------------------------------------------------
 | Compile js app
 |--------------------------------------------------------------------------
 */

mix.js('assets/js/app.js', 'public/js')

/*
 |--------------------------------------------------------------------------
 | Compile post css
 |--------------------------------------------------------------------------
 */

mix.postCss('assets/css/app.css', 'public/css/app.min.css')

/*
 |--------------------------------------------------------------------------
 | Production logic
 |--------------------------------------------------------------------------
 |
 | If we are in production mode, mix will start purgeCss
 | to reduce size of css files.
 |
 */

if (process.env.NODE_ENV === 'production') {
    mix.purgeCss({
        // Will *only* look for views and simplemde classes
        paths: () => glob.sync([
            path.join(__dirname, 'assets/**/*.vue'),
        ]),
        extractorPattern: /[\w-/:]+(?<!:)/g,
    });
}
