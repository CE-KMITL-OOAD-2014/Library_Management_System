<?php

class AuthenController extends BaseController {


	public function check_login()
	{

		// $inputData = array ('Username' => Input::get('txtUsername'), 'Password' => Input::get('txtPassword'));
		// if (Auth::attempt($inputData)){
		// 	return Redirect::intended('/person/profile'); 
		// }else{
		// 	return Redirect::to('/login');
		// }
		session_start();

		$user = new Person;
		$tmp = $user->getRepository(Input::get('txtUsername'),Input::get('txtPassword'));
		

		//$strSQL = "SELECT * FROM members WHERE Username = '".mysqli_real_escape_string($mysqli, $_POST['txtUsername'])."' 
		//and Password = '".mysqli_real_escape_string($mysqli, $_POST['txtPassword'])."'";

		//$objQuery = mysqli_query($mysqli,$strSQL);
		//$objResult = mysqli_fetch_array($objQuery);
		if($tmp==NULL)
		{
			echo "Username and Password Incorrect!";
			echo "<br> Go to <a href='login'>Login</a>";
		}
		else
		{
			$_SESSION["id"] = $tmp->getUserID();//$objResult["id"];
			$_SESSION["Status"] = $tmp->getStatus();//$objResult["Status"];


			session_write_close();


			return Redirect::to("/person/profile");
			//echo "<br> Go to <a href='person/admin_page'>Admin page</a>";
			
		}
	}

	public function logout()
	{
		session_start();
		session_destroy();
		echo "Logout Complete!" ;
		echo "<br> Go to <a href='/login'>Login</a>";
	}

}