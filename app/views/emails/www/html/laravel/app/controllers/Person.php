<?php

class Person extends BaseController {

	public function register()
	{
		return View::make('regisUser');
	}

	public function save_register()
	{
		return View::make('save_regisUser');
	}

	public function login()
	{
		return View::make('login');
	}

	public function check()
	{
		return View::make('check_login');
	}

	public function admin()
	{
		return View::make('admin_page');
	}

	public function user()
	{
		return View::make('user_page');
	}

	public function member()
	{
		return View::make('user_page');
	}

	public function edit()
	{
		return View::make('edit_profile');
	}

	public function save()
	{
		return View::make('save_profile');
	}

	public function logout()
	{
		return View::make('logout');
	}
}