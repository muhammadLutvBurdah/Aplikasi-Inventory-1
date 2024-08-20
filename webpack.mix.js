const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'node_modules/summernote/dist/summernote-bs4.css'
    ], 'public/css/summernote.css')
    .scripts([
        'node_modules/summernote/dist/summernote-bs4.js'
    ], 'public/js/summernote.js');
