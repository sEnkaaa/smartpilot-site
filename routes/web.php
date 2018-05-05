<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Authenticated routing */ 

Route::middleware('auth')->group(function() {

	Route::get('/', function() {
	    return redirect()->route('dashboard');
	});
	Route::get('/logout', 'LogoutController@index')->name('logout');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('/twitterAccountAdd', 'TwitterAccountAddController@index')->name('twitterAccountAdd');
	Route::post('/twitterAccountAdd', 'TwitterAccountAddController@store');

	Route::get('/twitterAccount/{twitter_id}', 'TwitterAccountController@index')->name('twitterAccount');
	Route::get('/twitterAccount/{twitter_id}/start', 'TwitterAccountController@start');
	Route::get('/twitterAccount/{twitter_id}/stop', 'TwitterAccountController@stop');
	Route::post('/twitterAccount/{twitter_id}', 'TwitterAccountController@store');
	Route::get('/twitterAccount/{twitter_id}/settings', 'TwitterAccountSettingsController@index')->name('twitterAccountSettings');
	Route::get('/twitterAccount/{twitter_id}/settings/add/keyword/{keywords}/{lang}', 'TwitterAccountSettingsController@addKeyword');
	Route::get('/twitterAccount/{twitter_id}/settings/remove/keyword/{keywords}/{lang}', 'TwitterAccountSettingsController@removeKeyword');
});

/* Unauthenticated routing */ 

Route::middleware('guest')->group(function() {

	Route::get('/', 'LandingController@index')->name('landing');

	Route::get('/signin', 'SignInController@index')->name('signin');
	Route::post('/signin', 'SignInController@store');
	Route::get('/signup', 'SignUpController@index')->name('signup');
	Route::post('/signup', 'SignUpController@store');

});