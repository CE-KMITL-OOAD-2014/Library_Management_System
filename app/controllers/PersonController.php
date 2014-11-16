<?php

class PersonController extends ServiceController {

	//save register when user registered .
	public function save_register(){
		if(Input::get('txtPassword') != Input::get('txtConPassword')){
			return View::make('alert/person/alertPassword');
		}
		$password = Hash::make(Input::get('txtPassword'));

		$newPerson = new Person;
		$toRepository = new InterfacePersonRepo;
		$newPerson->setUsername(Input::get('txtUsername'));
		$newPerson->setPassword($password);
		$newPerson->setName(Input::get('txtName'));
		$newPerson->setSurname(Input::get('txtSurName'));
		$newPerson->setAddress(Input::get('txtAddress'));
		$newPerson->setEmail(Input::get('txtEmail'));
		$newPerson->setPhone(Input::get('txtPhone'));
		$newPerson->setStatus(Input::get('ddlStatus'));
		if (Input::hasFile('member_file')) {
			$size = Input::file('member_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('member_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('member_file');
					$destinationPath = "memberPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->saveRepository($newPerson);

		if($returnValue==1){
			return View::make('alert/person/alertRegister');
		}else{
			return View::make('alert/person/alertRegister2');
		}
	}

	//save edit profile when member or libralian edited . (edit by self)
	public function save_edit(){
		session_start();
		if($_SESSION['id'] == ""){
			return View::make('alert/authen/alertLogin2');
		}
		if(Input::get('txtPassword') != Input::get('txtConPassword')){
			return View::make('alert/person/alertPassword');
		}
		$editPerson = new Person;
		$toRepository = new InterfacePersonRepo;

		$user = new InterfacePersonRepo;
		$tmp = $user->getRepositoryByID($_SESSION['id']);
		if($tmp->Password == Input::get('txtPassword')){
			$editPerson->setPassword($tmp->Password);
		}else{
			$password = Hash::make(Input::get('txtPassword'));
			$editPerson->setPassword($password);
		}

		$editPerson->setUserID($_SESSION['id']);
		$editPerson->setUsername(Input::get('txtUsername'));
		$editPerson->setName(Input::get('txtName'));
		$editPerson->setSurname(Input::get('txtSurName'));
		$editPerson->setAddress(Input::get('txtAddress'));
		$editPerson->setEmail(Input::get('txtEmail'));
		$editPerson->setPhone(Input::get('txtPhone'));
		$editPerson->setPath_file($_GET["path_file"]);
		if (Input::hasFile('member_file')) {
			$size = Input::file('member_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('member_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('member_file');
					$destinationPath = "memberPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->editRepository($editPerson);

		if($returnValue==1){
			return View::make('alert/person/alertSave');
		}else{
			return View::make('alert/person/alertSave2');
		}
	}

	//show profile of member or libralian.
	public function profile(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByID($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('admin_page')->with('User',$tmpUser);
		}else{
			return View::make('user_page')->with('User',$tmpUser);
		}
	}

	//edit profile's user by self.
	public function edit(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByID($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('edit_profile_admin')->with('User',$tmpUser);
		}else{
			return View::make('edit_profile_user')->with('User',$tmpUser);
		}
	}

	//show list of users.
	public function show_list(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "ADMIN"){
			return View::make('alert/authen/alertWarning');
		}
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryAll();
		return View::make('listUser')->with('User',$tmpUser);
	}

	//edit profile's (member or libralian) by librarian.
	public function edit_user(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByID($_GET["UserID"]);
		return View::make('edit_user')->with('User',$tmpUser);
	}

	//save all profile is edited by librarian.
	public function save_edit_user(){
		session_start();
		if($_SESSION['id'] == ""){
			return View::make('alert/authen/alertLogin2');
		}
	
		$editPerson = new Person;
		$toRepository = new InterfacePersonRepo;
		$editPerson->setUserIDold($_GET["UserID"]);
		$editPerson->setUserID(Input::get('txtUserID'));
		$editPerson->setUsername(Input::get('txtUsername'));
		$editPerson->setName(Input::get('txtName'));
		$editPerson->setSurname(Input::get('txtSurName'));
		$editPerson->setEmail(Input::get('txtEmail'));
		$editPerson->setPhone(Input::get('txtPhone'));
		$editPerson->setStatus(Input::get('ddlStatus'));
		$editPerson->setPath_file($_GET["path_file"]);
		if (Input::hasFile('member_file')) {
			$size = Input::file('member_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('member_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('member_file');
					$destinationPath = "memberPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->editUserRepository($editPerson);
		
		if($returnValue==2){
			return View::make('alert/person/alertSave3');
		}else if($returnValue==1){
			return View::make('alert/person/alertSave4');
		}else{
			return View::make('alert/person/alertSave2');
		}
	}

	//delete user by checkbox in list of users pages.
	public function delete_user(){
		$toRepository = new InterfacePersonRepo;
		if(!isset($_POST["chkDel"])){
			return View::make('alert/person/alertDelete');
		}else {
			for($i=0;$i<count($_POST["chkDel"]);$i++){
				if(($_POST["chkDel"][$i]) != ""){
					$toRepository->deleteRepository($_POST["chkDel"][$i]);
				}
			}
			return View::make('alert/person/alertDelete2');
		}
	}

	//add user by librarian.
	public function add_user(){
		session_start();
		if($_SESSION['Status'] == "ADMIN"){
			return View::make('addUser');
		}
	}

	//save user when added by librarian.
	public function save_add_user(){
		if(Input::get('txtPassword') != Input::get('txtConPassword')){
			return View::make('alert/person/alertPassword');
		}
		$password = Hash::make(Input::get('txtPassword'));

		$newPerson = new Person;
		$toRepository = new InterfacePersonRepo;
		$newPerson->setUsername(Input::get('txtUsername'));
		$newPerson->setPassword($password);
		$newPerson->setName(Input::get('txtName'));
		$newPerson->setSurname(Input::get('txtSurName'));
		$newPerson->setAddress(Input::get('txtAddress'));
		$newPerson->setEmail(Input::get('txtEmail'));
		$newPerson->setPhone(Input::get('txtPhone'));
		$newPerson->setStatus(Input::get('ddlStatus'));
		if (Input::hasFile('member_file')) {
			$size = Input::file('member_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('member_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('member_file');
					$destinationPath = "memberPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->saveRepository($newPerson);

		if($returnValue==1){
			return View::make('alert/person/alertAddUser');
		}else{
			return View::make('alert/person/alertAddUser2');
		}
	}

	//show list of users who have fine.
	public function show_list_fine(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "ADMIN"){
			return View::make('alert/authen/alertWarning');
		}

		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByFine();
		return View::make('show_list_fine')->with('User',$tmpUser);
	}

	//show main page when user login.
	public function main(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByID($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('admin_main');
		}else{
			return View::make('user_main');
		}
	}
}