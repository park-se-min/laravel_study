const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
	mix.sass('app.scss');

	mix.webpack('app.js');

	mix.scripts([
	  '../../../node_modules/highlightjs/highlight.pack.js',
	  '../../../node_modules/dropzone/dist/dropzone.js',
	  '../../../public/js/app.js'
	], 'public/js/app.js');

	mix.version([
		'css/app.css',
		'js/app.js'
	]);
	//mix.browserSync({proxy:'localhost:8080'});
});
