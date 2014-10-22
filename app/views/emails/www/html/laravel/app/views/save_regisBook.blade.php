<?php
$mysqli = mysqli_connect("localhost","root","web","mydatabase");

if(trim($_POST["txtNameThai"]) == "")
{
	echo "Please input Bookname(thai)!";
	exit();
}

if(trim($_POST["txtNameEng"]) == "")
{
	echo "Please input Bookname(english)!";
	exit();
}

if(trim($_POST["txtSubject"]) == "")
{
	echo "Please input Subject!";
	exit();
}  

if(trim($_POST["txtAuthor"]) == "")
{
	echo "Please input Author!";
	exit();
} 

if(trim($_POST["txtPublishing"]) == "")
{
	echo "Please input Publishing!";
	exit();
} 

if(trim($_POST["txtEdition"]) == "")
{
	echo "Please input Edition!";
	exit();
}  

if(trim($_POST["txtYear"]) == "")
{
	echo "Please input Year!";
	exit();
}

if(trim($_POST["txtDetail"]) == "")
{
	echo "Please input Detail!";
	exit();
}  

if(trim($_POST["txtISBN"]) == "")
{
	echo "Please input ISBN!";
	exit();
} 

if(trim($_POST["txtCallNum"]) == "")
{
	echo "Please input CallNum!";
	exit();
}
  

$strSQL = "SELECT * FROM book WHERE Title1 = '".trim($_POST['txtNameThai'])."'  ";
$objQuery = mysqli_query($mysqli,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{
	echo "Bookname already exists!";
}
else
{  
	
	$strSQL = "INSERT INTO book 
	(Title1,Title2,Subject,Author,Publishing,Edition,Year,Detail,
		ISBN,CallNum,Type,SubType,Status) VALUES ('".$_POST["txtNameThai"]."',
		'".$_POST["txtNameEng"]."', '".$_POST["txtSubject"]."',
		'".$_POST["txtAuthor"]."','".$_POST["txtPublishing"]."',
		'".$_POST["txtEdition"]."','".$_POST["txtYear"]."',
		'".$_POST["txtDetail"]."','".$_POST["txtISBN"]."',
		'".$_POST["txtCallNum"]."','".$_POST["ddlType"]."',
		'".$_POST["ddlSubType"]."','".$_POST["ddlStatus"]."')" ;

$objQuery = mysqli_query($mysqli,$strSQL);

echo "Register Book Completed!<br>";      

echo "<br> Go to <a href='person/admin'>Admin page</a>";

}

?>
