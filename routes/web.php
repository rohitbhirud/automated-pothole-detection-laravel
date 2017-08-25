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


/*************************** auth routes ***************************/
Auth::routes();


/*************************** admin routes ***************************/

Route::get('/', 'HomeController@index')
		->middleware(['auth', 'redirectIfEngineer', 'role:admin'])
		->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function()
{
	/**
	 * Basic home & reports routes
	 */

		Route::get('/reports/{type?}', 'HomeController@reports')->name('reports');

	/**
	 * Engineers resource routes
	 */
	
		Route::resource('engineer', 'EngineersController');
		
		Route::get('engineer/{engineer}/complaints', 'EngineersController@complaints');

	/**
	 * User resource routes
	 */

		Route::prefix('user')->group(function ()
		{
			Route::get('/', 'UsersController@index')->name('users');
			Route::get('complaints/{user}', 'UsersController@complaints')->name('userComplaints');
			Route::delete('{user}', 'UsersController@destroy')->name('userDelete');
		});

	/**
	 * Complaint resource routes
	 */
		Route::prefix('complaint')->group(function ()
		{
			Route::get('/{type}', 'ComplaintsController@index')->name('complaints');
			Route::get('/details/{complaint}', 'ComplaintsController@show')->name('compDetails');
			Route::delete('{complaint}', 'ComplaintsController@destroy')->name('compDelete');

			Route::post('/{complaint}/assign', 'ComplaintsController@assign');
		});

});


/*************************** engineers route ***************************/

Route::group(['prefix' => 'mod', 'middleware' => ['auth', 'role:engineer']], function()
{

	Route::get('/', 'ModsController@index');

	Route::get('/complaints', 'ModsController@complaints');

	Route::get('/details/{complaint}', 'ModsController@details');

	Route::post('{id}', 'ModsController@update');

	Route::get('/complaints/closed', 'ModsController@closed');
});

Route::group(['prefix' => 'api'], function ()
{
	Route::post('/getComplaints', 'ApiController@getComplaints');
	Route::post('/jurkCreate', 'ApiController@jurkCreate');
	Route::post('/login', 'ApiController@login');
	Route::post('/register', 'ApiController@register');
	Route::post('/makeComplain', 'ApiController@makeComplain');
	Route::post('/makeVoiceComplain', 'ApiController@makeVoiceComplain');
});