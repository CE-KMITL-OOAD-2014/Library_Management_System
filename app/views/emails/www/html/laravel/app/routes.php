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

Route::get('person/register', 'Person@register');

Route::post('person/save_register', 'Person@save_register');

Route::get('person/login', 'Person@login');

Route::post('person/check', 'Person@check');

Route::get('person/admin', 'Person@admin');

Route::get('person/user', 'Person@user');

Route::get('person/member', 'Person@member');

Route::get('person/edit', 'Person@edit');

Route::post('person/save', 'Person@save');

Route::get('person/logout', 'Person@logout');

Route::get('book/register', 'Book@register');

Route::post('book/save_register', 'Book@save_register');





