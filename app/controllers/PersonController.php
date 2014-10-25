<?php

class PersonController extends BaseController {


	//Complete 25-10-2014
	public function save_register()
	{
		$newPerson = new Person;
		$newPerson->setUsername(Input::get('txtUsername'));
		$newPerson->setPassword(Input::get('txtPassword'));
		$newPerson->setName(Input::get('txtName'));
		$newPerson->setSurname(Input::get('txtSurName'));
		$newPerson->setAddress(Input::get('txtAddress'));
		$newPerson->setEmail(Input::get('txtEmail'));
		$newPerson->setPhone(Input::get('txtPhone'));
		$newPerson->setStatus(Input::get('ddlStatus'));
		$newPerson->saveRepository();
	}

	public function check_login()
	{
		$inputData = array ('Username' => Input::get('txtUsername'), 'Password' => Input::get('txtPassword'));
		if (Auth::attempt($inputData)){
			return Redirect::intended('/person/profile'); 
		}else{
			return Redirect::to('/login');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}


	public function save_edit()
	{
		$editPerson = new Person;
		$editPerson->setUserID(Input::get('txtUserID'));
		$editPerson->setUsername(Input::get('txtUsername'));
		$editPerson->setPassword(Input::get('txtPassword'));
		$editPerson->setName(Input::get('txtName'));
		$editPerson->setSurname(Input::get('txtSurName'));
		$editPerson->setAddress(Input::get('txtAddress'));
		$editPerson->setEmail(Input::get('txtEmail'));
		$editPerson->setPhone(Input::get('txtPhone'));
		$editPerson->setStatus(Input::get('txtStatus'));
		$editPerson->editRepository();
	}

	//Complete 25-10-2014
	public function profile($id)
	{
		$tmpUser = PersonRepository::find($id);
		if($tmpUser->Status=="ADMIN"){
			return View::make('admin_page')->with('User',$tmpUser);
		}else{
			return View::make('user_page')->with('User',$tmpUser);
		}
	}

	//Complete 25-10-2014
	public function edit($id)
	{
		$tmpUser = PersonRepository::find($id);
		return View::make('edit_profile')->with('User',$tmpUser);
	}

}