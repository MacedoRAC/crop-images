const mix = require('laravel-mix');

mix.combine([
	"resources/js/template/jquery-3.3.1.min.js",
	"resources/js/template/jquery-migrate-3.0.1.min.js",
	"resources/js/template/jquery-ui.js",
	"resources/js/template/bootstrap.min.js",
	"resources/js/template/jquery.countdown.min.js",
	"resources/js/template/aos.js",
	"resources/js/template/main.js",
], 'public/js/template.js');

mix.js('resources/js/app.js', 'public/js').version();
mix.sass('resources/sass/app.scss', 'public/css').version();