<?php
session_start();
if($_SESSION['UserID'] == "")
{
	echo "Please Login!";
	exit();
}

$mysqli = mysqli_connect("localhost","root","web","mydatabase");
if($_POST["txtPassword"] != $_POST["txtConPassword"])
{
	echo "Password not Match!";
	exit();
}

$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
,Name = '".trim($_POST['txtName'])."',Phone = '".trim($_POST['txtPhone'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";
$objQuery = mysqli_query($mysqli,$strSQL);

echo "Save Completed!<br>";		

if($_SESSION["Status"] == "ADMIN")
{
	echo "<br> Go to <a href='admin_page'>Admin page</a>";
}
else
{
	echo "<br> Go to <a href='user_page'>User page</a>";
}

?>