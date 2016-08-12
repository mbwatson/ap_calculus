var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass([
    	'app.scss',
		'yeti.min.css',
		'main.css',
		'nav.css',
		'jumbotron.css',
		'forms.css',
		'posts.css',
		'sidebar.css',
		'user.css',
		'buttons.css'
    ])
    .scripts([
    	'favorites.js',
    	'likes.js',
    	'flash-messages.js',
    	'jumbotron-toggler.js'
    ]);
});
