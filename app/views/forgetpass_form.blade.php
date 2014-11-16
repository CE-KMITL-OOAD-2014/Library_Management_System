@extends('layout')

@section('body')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ลืมรหัสผ่านเข้าสู่ระบบ - ระบบจัดการห้องสมุด (Library Management System)</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <center><strong><h1>ลืมรหัสผ่านเข้าสู่ระบบ</h1></strong></center>
        <form role="form" name="form1" method="post" action="send_password" >
          <div class="panel panel-info">
            <div class="panel-heading"><strong>Detail</strong></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12">
                  <label for="txtUsername" class="col-xs-4 control-label">Username</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtUsername" type="text" class="form-control" id="txtUsername" placeholder="Username" required autofocus>
                  </div>

                  <label for="txtEmail" class="col-xs-4 control-label">E-mail</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtEmail" type="email" class="form-control" id="txtEmail" placeholder="E-mail" required autofocus>
                  </div>

                  <label  class="col-xs-4 control-label"></label>
                  <div class="col-xs-8 form-group">
                    <button type="submit" name="Submit" value="Summit" class="btn btn-primary">Send Password</button>
                    <button type="reset" name="Reset" value="Reset" class="btn btn-danger">Reset</button>
                  </div>
                </div>
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
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>

@stop
