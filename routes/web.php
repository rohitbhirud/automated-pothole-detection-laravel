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

/*************************** admin routes ***************************/

/**
 * Basic home & reports routes
 */

Route::get('/', 'HomeController@index');
Route::get('/reports/{type}', 'HomeController@reports');

/**
 * Engineers resource routes
 */

Route::get('engineer/details/{id}', 'EngineersController@show');
Route::get('engineer/complaints', 'EngineersController@complaints');

Route::resource('engineer', 'EngineersController');

/**
 * User resource routes
 */

Route::prefix('user')->group(function ()
{
	Route::get('/', 'UsersController@index');
	Route::get('details/{user}', 'UsersController@show');
	Route::delete('{user}', 'UsersController@destroy');
});

/**
 * Complaint resource routes
 */
Route::prefix('complaint')->group(function ()
{
	Route::get('/{type}', 'ComplaintsController@index');
	Route::get('/details/{complaint}', 'ComplaintsController@show');
	Route::get('/{complaint}/edit', 'ComplaintsController@edit');
	Route::match(['put', 'patch'], '{complaint}', 'ComplaintsController@update');
	Route::delete('{complaint}', 'ComplaintsController@destroy');
});


/*************************** engineers route ***************************/
