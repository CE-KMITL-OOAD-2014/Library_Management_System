@extends('layout')

@section('body')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิกผู้ใช้งาน - ระบบจัดการห้องสมุด (Library Management System)</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8">
        <center><strong><h1>สมัครสมาชิกผู้ใช้งาน</h1></strong></center>
        <form role="form" name="form1" method="post" action="{{ url('/person/save_register') }}" enctype="multipart/form-data">
          <div class="panel panel-info">
            <div class="panel-heading"><strong>Please sign up</strong></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12">
                  <label for="txtUsername" class="col-xs-4 control-label">Username</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtUsername" type="text" class="form-control" id="txtUsername" placeholder="Username" required autofocus>
                  </div>

                  <label for="txtPassword" class="col-xs-4 control-label">Password</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="Password" required autofocus>
                  </div>

                  <label for="txtConPassword" class="col-xs-4 control-label">Confirm Password</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtConPassword" type="password" class="form-control" id="txtConPassword" placeholder="Confirm Password" required autofocus>
                  </div>


                  <label for="txtName" class="col-xs-4 control-label">Name</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtName" type="text" class="form-control" id="txtName" placeholder="Name" required autofocus>
                  </div>

                  <label for="txtSurName" class="col-xs-4 control-label">Surname</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtSurName" type="text" class="form-control" id="txtSurName" placeholder="Surname" required autofocus>
                  </div>

                  <label for="txtAddress" class="col-xs-4 control-label">Address/Office</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtAddress" type="text" class="form-control" id="txtAddress" placeholder="Address/Office" required autofocus>
                  </div>

                  <label for="txtEmail" class="col-xs-4 control-label">E-mail</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtEmail" type="email" class="form-control" id="txtEmail" placeholder="E-mail" required autofocus>
                  </div>

                  <label for="txtPhone" class="col-xs-4 control-label">Phone Number</label>
                  <div class="col-xs-8 form-group">
                    <input name="txtPhone" type="text" class="form-control" id="txtPhone" placeholder="Phone Number" required autofocus>
                  </div>

                  <label for="ddlStatus" class="col-xs-4 control-label">Status</label>
                  <div class="col-xs-8 form-group">
                    <select name="ddlStatus" id="ddlStatus" class="form-control">
                      <option value="USER">Member (สมาชิก)</option>
                    </select>
                  </div>

                  <label for="filename" class="col-xs-4 control-label">Picture</label>
                  <div class="col-xs-8 form-group">
                      <input type="file" class="flieinput" name="member_file" > 
                  </div>

                  <label  class="col-xs-4 control-label"></label>
                  <div class="col-xs-8 form-group">
                    <button type="submit" name="Submit" value="Summit" class="btn btn-primary">Register</button>
                    <button type="reset" name="Reset" value="Reset" class="btn btn-danger">Reset</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xs-2"></div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>

@stop
