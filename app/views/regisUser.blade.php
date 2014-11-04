@extends('layout')

@section('body')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>สมัครสมาชิกผู้ใช้งาน</title>

  <!-- Bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
     <div class="row">
      <div class="col-xs-6 col-md-3"></div>
      <div class="col-xs-6 col-md-6">
        <center><strong><h1>Sign up</h1></strong></center>
        <form role="form" name="form1" method="post" action="{{ url('/person/save_register') }}">
         <div class="panel panel-info">
          <div class="panel-heading"><strong>Please sign up</strong></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-6 col-md-12">
                <label for="txtUsername" class="col-md-4 control-label">Username</label>
                <div class="col-md-8 form-group">
                  <input name="txtUsername" type="text" class="form-control" id="txtUsername" placeholder="Username">
                </div>

                <label for="txtPassword" class="col-md-4 control-label">Password</label>
                <div class="col-md-8 form-group">
                  <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="Password">
                </div>

                <label for="txtConPassword" class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-8 form-group">
                  <input name="txtConPassword" type="password" class="form-control" id="txtConPassword" placeholder="Confirm Password">
                </div>


                <label for="txtName" class="col-md-4 control-label">Name</label>
                <div class="col-md-8 form-group">
                  <input name="txtName" type="text" class="form-control" id="txtName" placeholder="Name">
                </div>

                <label for="txtSurName" class="col-md-4 control-label">Surname</label>
                <div class="col-md-8 form-group">
                  <input name="txtSurName" type="text" class="form-control" id="txtSurName" placeholder="Surname">
                </div>

                <label for="txtAddress" class="col-md-4 control-label">Address/Office</label>
                <div class="col-md-8 form-group">
                  <input name="txtAddress" type="text" class="form-control" id="txtAddress" placeholder="Address/Office">
                </div>

                <label for="txtEmail" class="col-md-4 control-label">E-mail</label>
                <div class="col-md-8 form-group">
                  <input name="txtEmail" type="email" class="form-control" id="txtEmail" placeholder="E-mail">
                </div>

                <label for="txtPhone" class="col-md-4 control-label">Phone Number</label>
                <div class="col-md-8 form-group">
                  <input name="txtPhone" type="text" class="form-control" id="txtPhone" placeholder="Phone Number">
                </div>

                <label for="ddlStatus" class="col-md-4 control-label">Status</label>
                <div class="col-md-8 form-group">
                  <select name="ddlStatus" id="ddlStatus" class="form-control">
                   <option value="USER">Member (สมาชิก)</option>
                 </select>
               </div>

               <label  class="col-md-4 control-label"></label>
               <div class="col-md-8 form-group">
                <button type="submit" name="Submit" value="Summit" class="btn btn-primary">Register</button>
                <button type="reset" name="Reset" value="Reset" class="btn btn-danger">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="col-xs-6 col-md-3"></div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>

@stop
