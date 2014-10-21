<?php
$mysqli = mysqli_connect("localhost","root","web","mydatabase");

if(trim($_POST["txtUsername"]) == "")
{
	echo "Please input Username!";
	exit();
}

if(trim($_POST["txtPassword"]) == "")
{
	echo "Please input Password!";
	exit();
}  

if($_POST["txtPassword"] != $_POST["txtConPassword"])
{
	echo "Password not Match!";
	exit();
}

if(trim($_POST["txtName"]) == "")
{
	echo "Please input Name!";
	exit();
}

if(trim($_POST["txtEmail"]) == "")
{
	echo "Please input E-mail!";
	exit();
}

if(trim($_POST["txtPhone"]) == "")
{
	echo "Please input Phone Number!";
	exit();
}   

$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
$objQuery = mysqli_query($mysqli,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{
	echo "Username already exists!";
}
else
{  
	
	$strSQL = "INSERT INTO member 
	(Username,Password,Name,Email,Phone,Status) VALUES ('".$_POST["txtUsername"]."','".$_POST["txtPassword"]."',
		'".$_POST["txtName"]."','".$_POST["txtEmail"]."',
		'".$_POST["txtPhone"]."','".$_POST["ddlStatus"]."')";
$objQuery = mysqli_query($mysqli,$strSQL);

echo "Register Completed!<br>";      

echo "<br> Go to <a href='login'>Login page</a>";

}

?>
