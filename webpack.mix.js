const mix = require("laravel-mix");

require("laravel-mix-tailwind");

mix.js("resources/js/app.js", "public/js/app.js")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .tailwind("./tailwind.config.js")
    .sourceMaps()
    .browserSync({
        proxy: 'https://demo-livewire-datatables.test',
        https: true,
    });

if (mix.inProduction()) {
    mix.version();
}
