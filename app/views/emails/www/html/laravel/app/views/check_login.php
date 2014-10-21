<?php
session_start();
$mysqli = mysqli_connect("localhost","root","web","mydatabase");

$strSQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($mysqli, $_POST['txtUsername'])."' 
and Password = '".mysqli_real_escape_string($mysqli, $_POST['txtPassword'])."'";

$objQuery = mysqli_query($mysqli,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
	echo "Username and Password Incorrect!";
	echo "<br> Go to <a href='login'>Login</a>";
}
else
{
	$_SESSION["UserID"] = $objResult["UserID"];
	$_SESSION["Status"] = $objResult["Status"];

	session_write_close();

	if($objResult["Status"] == "ADMIN")
	{
		echo "Welcome Admin";
		echo "<br> Go to <a href='admin_page'>Admin page</a>";
	}
	else
	{
		echo "Welcome User";
		echo "<br> Go to <a href='user_page'>User page</a>";
	}
}

?>