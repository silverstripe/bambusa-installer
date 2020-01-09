const mix = require('laravel-mix');

mix.webpackConfig({
  externals: {
    jquery: 'jQuery'
  }
});

mix.react('src/js/main.js', 'dist/js');

mix
  .sass('src/scss/main.scss', 'dist/css')
  .sass('src/scss/editor.scss', 'css')
  .options({ processCssUrls: false });
