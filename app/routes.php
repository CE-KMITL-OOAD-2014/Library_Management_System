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

Route::get('/', function()
{
	return View::make('index');
});

//Group Person
Route::get('person/register', function()
{
	return View::make('regisUser');
});

Route::post('person/save_register', 'PersonController@save_register');

Route::get('person/{id}', 'PersonController@profile');

Route::get('person/edit/{id}', 'PersonController@edit');

Route::post('person/save_edit', 'PersonController@save_edit');

Route::get('person/login', function()
{
	return View::make('login');
});

Route::post('person/check_login', 'PersonController@check_login');

Route::get('person/logout', 'PersonController@logout');



//Group Book

Route::get('book/register', function()
{
	return View::make('regisBook');
});

Route::post('book/save_register', 'BookController@save_register');

Route::get('book/{id}', 'BookController@detail');

Route::get('book/edit/{id}', 'BookController@edit');

Route::post('book/save_edit', 'BookController@save_edit');