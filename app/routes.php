<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::get('/', 'HomeController@getIndex');
Route::get('/performance/school/pri:{params}', 'PerformanceController@getPrimarySchool');
Route::get('/discover', 'DiscoverController@getIndex');
Route::get('/search', 'SearchController@getIndex');

Route::get('/api/v1/', 'APIv1Controller@getIndex');
Route::get('/api/v1/search', 'APIv1Controller@getSearch');

App::missing(function($exception) {
	return Response::view('errors.404', array(), 404);
});