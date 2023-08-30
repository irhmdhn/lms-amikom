let mix = require('laravel-mix');

mix.js('src/js/min.js', 'public/js')
    .sass('src/sass/min.scss', 'css')    
    .setPublicPath('public');