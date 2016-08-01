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

// Homepage Route

Route::get('/', function () { return view('home'); });
Route::get('/todo', function () { return view('todo'); });

// Account routes // Auth required

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

Route::get('/account/notifications', function() {
	return redirect()->back();
});

Route::get('/favorites', function() {
	return view('account.favorites', ['user' => Auth::user()]);
});

Route::resource('account', 'AccountController', [
	'only' => ['index', 'edit', 'update']
]);

// Everything Else

Route::get('standards/mpacs', [
	'uses' => 'StandardController@showMpacs',
	'as' => 'standards.mpacs'
]);
Route::get('standards/big-ideas', [
	'uses' => 'StandardController@showBigIdeas',
	'as' => 'standards.big-ideas'
]);
Route::resource('standards', 'StandardController', [
	'only' => ['index', 'show']
]);

Route::group(['middleware' => 'auth'], function() {

	// User Routes
	Route::resource('users', 'UserController', [
		'only' => ['index', 'show']
	]);

	// Question Routes

	Route::get('questions/calculatoractive', [
		'uses' => 'QuestionController@showCalculatorActiveQuestions',
		'as' => 'questions.calculator.active'
	]);
	Route::get('questions/calculatorinactive', [
		'uses' => 'QuestionController@showCalculatorInactiveQuestions',
		'as' => 'questions.calculator.inactive'
	]);
	Route::get('questions/calculatorneutral', [
		'uses' => 'QuestionController@showCalculatorNeutralQuestions',
		'as' => 'questions.calculator.neutral'
	]);
	Route::get('questions/popular', [
		'uses' => 'QuestionController@showPopularQuestions',
		'as' => 'questions.popular'
	]);
	Route::get('questions/mine', [
		'uses' => 'QuestionController@showMyQuestions',
		'as' => 'questions.mine'
	]);
	Route::get('questions/favorites', [
		'uses' => 'QuestionController@showMyFavorites',
		'as' => 'questions.favorites'
	]);
	Route::get('questions/standards/{ids}', [
		'uses' => 'QuestionController@showQuestionsWithStandards',
		'as' => 'questions.withstandards'
	]);
	Route::get('questions/{questions}/pdf', [
		'uses' => 'QuestionController@makePDF',
		'as' => 'questions.makepdf'
	]);
	Route::get('questions/{questions}/printable', [
		'uses' => 'QuestionController@showPrintable',
		'as' => 'questions.showprintable'
	]);
	Route::resource('questions', 'QuestionController');

	// Comment Routes
	Route::resource('comments', 'CommentController', [
		'only' => ['store']
	]);

	// Favorite Routes
	Route::get('favorites/toggle/{id}', [
		'uses' => 'AccountController@favorite_toggle',
		'as' => 'favorite.toggle'
	]);

	// Search Routes
	Route::get('/search', [
		'uses' => 'SearchController@index',
		'as' => 'search.index',
	]);
	Route::post('/search/results', [
		'uses' => 'SearchController@results',
		'as' => 'search.results',
	]);

});
