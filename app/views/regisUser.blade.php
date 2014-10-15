@extends('layout')

@section('body')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิกผู้ใช้งาน</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="row">
   	<div class="col-xs-6 col-md-4"></div>
	<div class="col-xs-6 col-md-4">
	<form name="form1" method="post" action="save_register"> Register Form <br>
	<table width="400" border="1" style="width: 400px">
	<tbody>
	<tr>
		<td width="125"> &nbsp;Username</td>
		<td width="180">
			<input name="txtUsername" type="text" id="txtUsername" size="20">
		</td>
		</tr>

	<tr>
		<td> &nbsp;Password</td>
		<td> 
			<input name="txtPassword" type="password" id="txtPassword">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Confirm Password</td>
		<td>
			<input name="txtConPassword" type="password" id="txtConPassword">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Name</td>
		<td>
			<input name="txtName" type="text" id="txtName" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Surname</td>
		<td>
			<input name="txtSurname" type="text" id="txtSurname" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;E-mail</td>
		<td>
			<input name="txtEmail" type="text" id="txtEmail" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;PhoneNumber</td>
		<td>
			<input name="txtPhone" type="text" id="txtPhone" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Status</td>
		<td>
			<select name="ddlStatus" id="ddlStatus">
				<option value="ADMIN">ADMIN </option>
				<option value="USER">USER </option>
			</select>
		</td>
	</tr>
	</tbody>
	</table>
	<br>
		<input type="submit" name="Submit" value="Summit">
		<input type="submit" name="Submit" value="Summit">
	</form>
	</div>
	<div class="col-md-4"></div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

@stop