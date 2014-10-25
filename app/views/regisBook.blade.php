
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
  			<form name="form1" method="post" action="{{ url('/book/save_register') }}">
  				<center>Register Form</center>
  				<br>
  				<table width="400" border="1" style="width: 400px">
  					<tbody>
  						<tr>
  							<td width="125"> &nbsp;Title (Thai)</td>
  							<td width="180">
  								<input name="txtNameThai" type="text" id="txtNameThai" class="form-control" placeholder="Title (Thai)">
  							</td>
  						</tr>

  						<tr>
  							<td width="125"> &nbsp;Title (English)</td>
  							<td width="180">
  								<input name="txtNameEng" type="text" id="txtNameEng" class="form-control" placeholder="Title (English)">
  							</td>
  						</tr>

						<tr>
  							<td> &nbsp;Subject</td>
  							<td>
  								<input name="txtSubject" type="text" id="txtSubject" class="form-control" placeholder="Subject">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Author</td>
  							<td>
  								<input name="txtAuthor" type="text" id="txtAuthor" class="form-control" placeholder="Author">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Publishing</td>
  							<td>
  								<input name="txtPublishing" type="text" id="txtPublishing" class="form-control" placeholder="Publishing">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Edition/Year</td>
  							<td>
  								<input name="txtEdition" type="text" id="txtEdition" class="form-control" placeholder="Edition">
  								<input name="txtYear" type="text" id="txtYear" class="form-control" placeholder="Year">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Detail</td>
  							<td>
  								<input name="txtDetail" type="text" id="txtDetail" class="form-control" placeholder="Detail">
  							</td>
  						</tr>


  						<tr>
  							<td> &nbsp;ISBN/ISSN</td>
  							<td>
  								<input name="txtISBN" type="text" id="txtISBN" class="form-control" placeholder="ISBN/ISSN">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Call Number</td>
  							<td>
  								<input name="txtCallNum" type="text" id="txtCallNum" class="form-control" placeholder="Call Number">
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Type</td>
  							<td>
  								<select name="ddlType" id="ddlType" class="form-control">
  									<option value="000">Generalities (000)</option>
  									<option value="100">Philosophy (100)</option>
  									<option value="200">Religion (200)</option>
  									<option value="300">Social Sciences (300)</option>
  									<option value="400">Language (400)</option>
  									<option value="500">Science (500)</option>
  									<option value="600">Technology (600)</option>
  									<option value="700">Art & Recreation (700)</option>
  									<option value="800">Literature (800)</option>
  									<option value="900">Geograph & History (900)</option>
  								</select>
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;SubType</td>
  							<td>
  								<select name="ddlSubType" id="ddlSubType" class="form-control">
  									<option value="000">Generalities (000)</option>
  									<option value="100">Philosophy (100)</option>
  									<option value="200">Religion (200)</option>
  									<option value="300">Social Sciences (300)</option>
  									<option value="400">Language (400)</option>
  									<option value="500">Science (500)</option>
  									<option value="600">Technology (600)</option>
  									<option value="700">Art & Recreation (700)</option>
  									<option value="800">Literature (800)</option>
  									<option value="900">Geograph & History (900)</option>
  								</select>
  							</td>
  						</tr>

  						<tr>
  							<td> &nbsp;Status</td>
  							<td>
  								<select name="ddlStatus" id="ddlStatus" class="form-control">
  									<option value="OnBookshelf">On Bookshelf</option>
  									<option value="Borrow">Borrow</option>
  								</select>
  							</td>
  						</tr>

  					</tbody>
  				</table>
  				<br>
  				<button type="submit" name="Submit" value="Summit" class="btn btn-primary">Submit</button>
  				<button type="reset" name="Submit" value="Summit" class="btn btn-danger">Reset</button>
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

 