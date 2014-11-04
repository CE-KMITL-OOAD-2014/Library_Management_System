<?php

class PersonController extends BaseController {


	//Complete 25-10-2014
	public function save_register()
	{
		if(trim(Input::get('txtUsername')) == "")
		{
			echo "Please input Username!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtPassword')) == "")
		{
			echo "Please input Password!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}  

		if(Input::get('txtPassword') != Input::get('txtConPassword'))
		{
			echo "Password not Match!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtName')) == "")
		{
			echo "Please input Name!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtSurName')) == "")
		{
			echo "Please input Surname!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtAddress')) == "")
		{
			echo "Please input Address/Office!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		} 

		if(trim(Input::get('txtEmail')) == "")
		{
			echo "Please input E-mail!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtPhone')) == "")
		{
			echo "Please input PhoneNumber!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

	
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

	public function save_edit()
	{
		session_start();
		if($_SESSION['id'] == "")
		{
			echo "Please Login!";
			exit();
		}
		if(Input::get('txtPassword') != Input::get('txtConPassword'))
		{
			echo "Password not Match!";
			exit();
		}

		$editPerson = new Person;
		$editPerson->setUserID($_SESSION['id']);
		$editPerson->setUsername(Input::get('txtUsername'));
		$editPerson->setPassword(Input::get('txtPassword'));
		$editPerson->setName(Input::get('txtName'));
		$editPerson->setSurname(Input::get('txtSurName'));
		$editPerson->setAddress(Input::get('txtAddress'));
		$editPerson->setEmail(Input::get('txtEmail'));
		$editPerson->setPhone(Input::get('txtPhone'));
		$editPerson->editRepository();
	}

	//Complete 25-10-2014
	public function profile()
	{
		session_start();

		$tmpUser = PersonRepository::find($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('admin_page')->with('User',$tmpUser);
		}else{
			return View::make('user_page')->with('User',$tmpUser);
		}
	}

	//Complete 25-10-2014
	public function edit()
	{
		session_start();
		$tmpUser = PersonRepository::find($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('edit_profile_admin')->with('User',$tmpUser);
		}else{
			return View::make('edit_profile_user')->with('User',$tmpUser);
		}
	}

	public function show_list()
	{
		$tmpUser = PersonRepository::all();
		return View::make('listUser')->with('User',$tmpUser);
	}

	public function edit_user()
	{
		$tmpUser = PersonRepository::find($_GET["UserID"]);
		return View::make('edit_user')->with('User',$tmpUser);
	}

	public function save_edit_user()
	{
		session_start();
		if($_SESSION['id'] == "")
		{
			echo "Please Login!";
			exit();
		}
	
		$editPerson = new Person;
		$editPerson->setUserIDold($_GET["UserID"]);
		$editPerson->setUserID(Input::get('txtUserID'));
		$editPerson->setUsername(Input::get('txtUsername'));
		$editPerson->setName(Input::get('txtName'));
		$editPerson->setSurname(Input::get('txtSurName'));
		$editPerson->setEmail(Input::get('txtEmail'));
		$editPerson->setPhone(Input::get('txtPhone'));
		$editPerson->setStatus(Input::get('ddlStatus'));
		$editPerson->editUserRepository();
	}

	public function delete_user()
	{
		if(!isset($_POST["chkDel"])){
			echo "No select Member.<br>";
			echo "<br> Go to <a href='list_user'>List User</a>";
		}else {
			for($i=0;$i<count($_POST["chkDel"]);$i++){
				if(($_POST["chkDel"][$i]) != ""){
					PersonRepository::destroy($_POST["chkDel"][$i]);
				}
			}
			echo "Delete Complete.<br>";
			echo "<br> Go to <a href='list_user'>List User</a>";
		}
	}

	public function search()
	{
		session_start();
		if($_SESSION['Status'] == "ADMIN"){
			$tmpSearch = $_GET["txtKeyword"];
			if($tmpSearch == ""){
				$tmpUser = PersonRepository::all();
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}else{
				$tmpUser = PersonRepository::where('Username','like',"$tmpSearch%")
				->orWhere('Name','like',"$tmpSearch%")->get();
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}
		}
	}

}