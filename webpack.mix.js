const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');


mix.js('resources/js/index.js', 'public/js')
    .react()
    .extract(["react"])
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss")
      ])
    .sass('resources/sass/app.scss', 'public/css')

