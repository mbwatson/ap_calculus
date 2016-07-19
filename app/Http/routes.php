<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication (Login/Logout) Route

Route::auth();

// Homepage Routes

Route::get('/', function () {
    return view('home');
});

// Account routes // Auth required

Route::get('/account', [
	'uses' => 'AccountController@profile',
	'as' => 'account.index'
]);

Route::get('/account/edit', [
	'uses' => 'AccountController@edit',
	'as' => 'account.edit'
]);

Route::patch('/account/update', [
	'uses' => 'AccountController@update',
	'as' => 'account.update'
]);

Route::post('/account/update/avatar', [
	'uses' => 'AccountController@update_avatar'
]);

Route::get('/favorites', function() {
	return view('account.favorites', ['user' => Auth::user()]);
});

Route::resource('account', 'AccountController', [
	'only' => ['index', 'edit', 'update']
]);

// Everything Else

Route::group(['middleware' => 'auth'], function() {

	Route::resource('users', 'UserController', [
		'only' => ['index', 'show']
	]);

	Route::resource('questions', 'QuestionController');

	Route::resource('standards', 'StandardController', [
		'only' => ['index', 'show', 'store']
	]);

	Route::resource('comments', 'CommentController', [
		'only' => ['store']
	]);

	Route::get('favorites/toggle/{id}', [
		'uses' => 'AccountController@favorite_toggle',
		'as' => 'favorite.toggle'
	]);

	Route::post('/search/results', [
		'uses' => 'SearchController@results',
		'as' => 'search.results',
	]);

	Route::get('/search', [
		'uses' => 'SearchController@index',
		'as' => 'search.index',
	]);

});
