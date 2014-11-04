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

//Group Index
Route::get('/', function()
{
	return View::make('index');
});

Route::get('login', function()
{
	return View::make('login');
});

Route::post('check_login', 'AuthenController@check_login');

Route::get('logout', 'AuthenController@logout');


//Group Person
Route::get('person/register', function()
{
	return View::make('regisUser');
});

Route::post('person/save_register', 'PersonController@save_register');

Route::get('person/profile', 'PersonController@profile');

Route::get('person/edit', 'PersonController@edit');

Route::post('person/save_edit', 'PersonController@save_edit');

Route::get('person/list_user', 'PersonController@show_list');

Route::get('person/edit_user', 'PersonController@edit_user');

Route::post('person/save_edit_user', 'PersonController@save_edit_user');

Route::post('person/delete', 'PersonController@delete_user');

//Group Book
Route::get('book/register', function()
{
	return View::make('regisBook');
});

Route::post('book/save_register', 'BookController@save_register');

Route::get('book/list_book', 'BookController@show_list');

Route::get('book/edit_book', 'BookController@edit_book');

Route::post('book/save_edit_book', 'BookController@save_edit_book');

Route::post('book/delete', 'BookController@delete_book');

Route::get('book/detailbook', 'BookController@detailbook');

//Group Service
Route::get('book/search_book_list', 'ServiceController@searchBook');

Route::get('book/search_book', 'ServiceController@searchBook_View');

Route::get('book/checkbooking', 'ServiceController@checkbooking');

Route::post('book/SaveBookingBook', 'ServiceController@save_booking');

Route::get('book/booking_history', 'ServiceController@booking_history');

Route::get('book/borrow_history', 'ServiceController@borrow_history');

Route::get('book/edit_booking_Date', 'ServiceController@edit_booking_Date');

Route::get('book/check_cancel_booking', 'ServiceController@check_cancel_booking');

Route::post('book/CancelBooking', 'ServiceController@cancel_booking');

Route::get('book/BorrowCon', 'ServiceController@borrow_con');

Route::post('book/SaveReturnDate', 'ServiceController@save_borrow_con');

Route::get('book/return_book', 'ServiceController@return_book');

Route::get('book/borrow_book', 'ServiceController@borrowBook');

Route::post('book/save_borrow_book', 'ServiceController@save_borrow');

Route::get('person/search_user', function()
{
	return View::make('search_user');
});

Route::get('person/search_user_list', 'ServiceController@searchUser');

