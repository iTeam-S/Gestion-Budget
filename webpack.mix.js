const mix = require('laravel-mix');


mix.js('resources/js/index.js', 'public/js')
    .react()
    .extract(["react"])
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss")
      ])
    .sass('resources/scss/app.scss', 'public/css')

