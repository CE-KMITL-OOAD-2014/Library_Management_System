<?php

class AuthenController extends BaseController {

	//check login when user was arrived to login.
	public function check_login(){
		session_start();
		$user = new InterfacePersonRepo;
		$tmp = $user->getRepository(Input::get('txtUsername'));
		if($tmp==NULL){
			return View::make('alert/authen/alertLogin');
		}else{
			if (Hash::check(Input::get('txtPassword'), $tmp->getPassword())){
				$_SESSION["id"] = $tmp->getUserID();
				$_SESSION["Username"] = $tmp->getUsername();
				$_SESSION["Name"] = $tmp->getName();
				$_SESSION["Surname"] = $tmp->getSurname();
				$_SESSION["Address"] = $tmp->getAddress();
				$_SESSION["Email"] = $tmp->getEmail();
				$_SESSION["Phone"] = $tmp->getPhone();
				$_SESSION["Status"] = $tmp->getStatus();
				$_SESSION["Filename"] = $tmp->getPath_file();
				$_SESSION["Fine"] = $tmp->getFine();

				session_write_close();
				return Redirect::to("/main");
			}else{
				return View::make('alert/authen/alertLogin');
			}
		}
	}

	public function logout(){
		session_start();
		session_destroy();
		return View::make('alert/authen/alertLogout');
	}

	//send password to email that user registered when user have forgoten it.
	public function send_password(){
		$tmpUsername = $_POST["txtUsername"];
		$tmpEmail = $_POST["txtEmail"];
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByUsername($tmpUsername);
		if(count($tmpUser)>1){
			exit();
		}
		if($tmpUser[0]->Email == $tmpEmail){
			$fgUser = new Person;
			$fgUser->setUsername($tmpUsername);
			$fgUser->setEmail($tmpEmail);
			$email = $inRepository->sendmailRepository($fgUser);
			return View::make('alert/authen/alertEmail')->with('Email',$email);
		}else{
			return View::make('alert/authen/alertEmail2');
		}
	}

	public function login(){
		session_start();
		if($_SESSION!=NULL){
			return Redirect::to("/main");
		}else{
			return View::make('login');
		}
	}
}