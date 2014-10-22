<?php
session_start();
if($_SESSION['UserID'] == "")
{
  echo "Please Login!";
  exit();
}

if($_SESSION['Status'] != "USER")
{
  echo "This page for User only!";
  exit();
}	

$mysqli = mysqli_connect("localhost","root","web","mydatabase");
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
$objQuery = mysqli_query($mysqli,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
?>
<html>
<head>
  <title>User Page</title>
</head>
<body>
  Welcome to User Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["Name"];?></td>
      </tr>
      <tr>
        <td> &nbsp;E-mail</td>
        <td><?php echo $objResult["Email"];?></td>
      </tr>
      <tr>
        <td> &nbsp;TelPhone</td>
        <td><?php echo $objResult["Phone"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td><?php echo $objResult["Status"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit">Edit Profile</a><br>
  <br>
  <a href="logout">Logout</a>
</body>
</html>