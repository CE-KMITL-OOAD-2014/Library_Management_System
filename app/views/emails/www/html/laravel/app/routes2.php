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
	return View::make('hello');
});

Route::get('regisUser', function()
{
	return View::make('regisUser');
});

Route::post('save_register', function()
{
	return View::make('save_register');
});

Route::get('login', function()
{
	return View::make('login');
});

Route::post('check_login', function()
{
	return View::make('check_login');
});

Route::get('admin_page', function()
{
	return View::make('admin_page');
});

Route::get('user_page', function()
{
	return View::make('user_page');
});

Route::get('edit_profile', function()
{
	return View::make('edit_profile');
});

Route::post('save_profile', function()
{
	return View::make('save_profile');
});

Route::get('logout', function()
{
	return View::make('logout');
});





