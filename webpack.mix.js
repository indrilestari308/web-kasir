mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .postCss('resources/css/custom.css', 'public/css')
   .copy('resources/images', 'public/images')
   .sourceMaps();
