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
  .vue()
  .sass('resources/sass/app.scss', 'public/css', {
    sassOptions: {
      quietDeps: true,
    },
  })
  .options({
    postCss: [
      require('postcss-import'),
      require('tailwindcss'),
      require('autoprefixer'),
    ]
  })
  .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
  mix.version();
}

mix.options({
  hmrOptions: {
    host: 'localhost',
    port: '8080'
  }
});
