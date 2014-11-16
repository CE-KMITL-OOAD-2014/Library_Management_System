@extends('layout')

@section('body')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - ระบบจัดการห้องสมุด (Library Management System)</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <center><strong><h1>Login</h1></strong></center>
        <form class="form-signin" role="form" name="form1" method="post" action="check_login">
          <div class="panel panel-primary">
            <div class="panel-heading"><strong>Please sign in</strong></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-1"></div>
                  <div class="col-xs-10">
                    <div class="form-group">
                      <label for="txtUsername">Username</label>
                      <input name="txtUsername" type="text" class="form-control" id="txtUsername" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label for="txtPassword">Password</label>
                      <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="Enter Password">
                    </div>
                    <button type="submit" name="Login" value="Login" class="btn btn-success">Login</button>
                    <button type="reset" name="Clear" value="Clear" class="btn btn-danger">Clear</button>
                    <a href="forget_password_form"><input type="button" name="ForgetPassword" value="Forget Password" class="btn btn-info"/></a>
                  </div>
                <div class="col-xs-1"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xs-3"></div>
    </div> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

@stop