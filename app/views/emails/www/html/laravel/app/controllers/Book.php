<?php

class Book extends BaseController {

	public function register()
	{
		return View::make('regisBook');
	}

	public function save_register()
	{
		return View::make('save_regisBook');
	}

}