const mix = require('laravel-mix');

mix.js([
    'resources/js/app.js',
    'resources/js/ajax.js',
    'resources/js/drapNdrop.js',

    ], 'public/js').sass('resources/sass/app.scss', 'public/css')
                    .sourceMaps();
