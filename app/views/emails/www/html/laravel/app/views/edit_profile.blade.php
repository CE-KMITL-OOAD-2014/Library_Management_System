<?php
session_start();
if($_SESSION['UserID'] == "")
{
  echo "Please Login!";
  exit();
}

$mysqli = mysqli_connect("localhost","root","web","mydatabase");
$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
$objQuery = mysqli_query($mysqli,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
?>
<html>
<head>
  <title>Edit Profile</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
  <body>
    <form name="form1" method="post" action="save">
      Edit Profile! <br>
      <table width="400" border="1" style="width: 400px">
        <tbody>
          <tr>
            <td width="125"> &nbsp;UserID</td>
            <td width="180">
              <?php echo $objResult["UserID"];?>
            </td>
          </tr>
          <tr>
            <td> &nbsp;Username</td>
            <td>
              <?php echo $objResult["Username"];?>
            </td>
          </tr>
          <tr>
            <td> &nbsp;Password</td>
            <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
            </td>
          </tr>
          <tr>
            <td> &nbsp;Confirm Password</td>
            <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
            </td>
          </tr>
          <tr>
            <td>&nbsp;Name</td>
            <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
          </tr>
          <tr>
          <tr>
            <td>&nbsp;TelPhone</td>
            <td><input name="txtPhone" type="text" id="txtPhone" value="<?php echo $objResult["Phone"];?>"></td>
          </tr>
          <tr>
            <td> &nbsp;Status</td>
            <td>
              <?php echo $objResult["Status"];?>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <input type="submit" name="Submit" value="Save">
    </form>
  </body>
  </html>