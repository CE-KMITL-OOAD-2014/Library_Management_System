<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>เพิ่มบัญชีผู้ใช้งาน - ระบบจัดการห้องสมุด (Library Management System)</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
  </head>

  <body>
    <!-- Header -->
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <span class="glyphicon glyphicon-home"></span> Library Management System 
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">
                <li><a href="/person/profile">My Profile</a></li>
              </ul>
            </li>
            <li><a href="/logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Main -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2">
          <!-- Left column -->
          <strong><a href="/main"><i class="glyphicon glyphicon-wrench"></i> Panal Manangment</strong></a>  
          <hr>
          <ul class="list-unstyled">
            <li class="nav-header">
              <a href="#" data-toggle="collapse" data-target="#MenuBook">
                <h5><span class="glyphicon glyphicon-book"></span> Book <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuBook">
                <li><a href="/book/register"><i class="glyphicon glyphicon-plus"></i> Add</a></li>
                <li><a href="/book/list_book"><i class="glyphicon glyphicon-th-list"></i> List </a></li>
                <li><a href="/book/search_book"><i class="glyphicon glyphicon-search"></i> Search </a></li>
                <li><a href="/book/topchart"><i class="glyphicon glyphicon-stats"></i> Top 10 </a></li>
              </ul>
            </li>
            <li class="nav-header">
              <a href="#" data-toggle="collapse" data-target="#MenuPerson">
                <h5><span class="glyphicon glyphicon-user"></span> Account <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuPerson">
                <li><a href="/person/add_user"><i class="glyphicon glyphicon-plus"></i> Add</a></li>
                <li><a href="/person/list_user"><i class="glyphicon glyphicon-th-list"></i> List </a></li>
                <li><a href="/person/search_user"><i class="glyphicon glyphicon-search"></i> Search </a></li>
                <li><a href="/person/list_fine"><i class="glyphicon glyphicon-usd"></i> Fine </a></li>
              </ul>
            </li>
          </ul>
          <hr>    
        </div>

        <!-- Right column -->
        <div class="col-xs-10">
          <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
              <center><strong><h1>เพิ่มบัญชีผู้ใช้งาน</h1></strong></center>
              <form role="form" name="form1" method="post" action="{{ url('/person/save_add_user') }}" enctype="multipart/form-data">
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
                            <option value="ADMIN">Librarian (บรรณารักษ์)</option>
                            <option value="USER">Member (สมาชิก)</option>
                         </select>
                        </div>

                        <label for="filename" class="col-xs-4 control-label">Picture</label>
                        <div class="col-xs-8 form-group">
                          <input type="file" class="flieinput" name="member_file" > 
                        </div>

                        <label  class="col-xs-4 control-label"></label>
                        <div class="col-xs-8 form-group">
                          <button type="submit" name="Submit" value="Summit" class="btn btn-primary">Add</button>
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
        </div>
      </div>
    </div>
  </body>

  <!-- End -->
  <footer class="text-center">
    <center>
      <p>Power by 2PM CE@KMITL</p>
      <p>Contract us : <a href="mailto:library2pm@gmail.com">library2pm@gmail.com</a></p>
      <p>Copyright © 2014 all rights reserved</p>
    </center>
  </footer>

  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/scripts.js"></script>
</html>
