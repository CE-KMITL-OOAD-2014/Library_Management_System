<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ลงทะเบียนหนังสือ</title>

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
		<td width="125"> &nbsp;Title(Thai)</td>
		<td width="180">
			<input name="txtNameThai" type="text" id="txtNameThai" size="35">
		</td>
	</tr>

	<tr>
		<td width="125"> &nbsp;Title(English)</td>
		<td width="180">
			<input name="txtNameEng" type="text" id="txtNameEng" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Publishing</td>
		<td>
			<input name="txtPublishing" type="text" id="txtPublishing" size="35">
		</td>
	</tr>

	<tr>
		<td> &nbsp;Type</td>
		<td>
			<input name="txtType" type="text" id="txtType" size="35">
		</td>
	</tr>

	</tbody>
	</table>
	<br>
		<input type="submit" name="Submit" value="Summit">
		<input type="submit" name="Submit" value="Summit">
	</form>
	</div>
	<div class="col-xs-6 col-md-4"></div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>