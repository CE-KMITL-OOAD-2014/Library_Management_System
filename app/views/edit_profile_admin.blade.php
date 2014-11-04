<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>แก้ไขข้อมูลสมาชิกผู้ใช้งาน</title>
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
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
              <span class="glyphicon glyphicon-home"></span> Library Management System </a>
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
        </div><!-- /container -->
      </div>
      <!-- /Header -->

      <!-- Main -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <!-- Left column -->
            <strong><i class="glyphicon glyphicon-wrench"></i> Panal Manangment</strong></a>  

            <hr>

            <ul class="list-unstyled">
              <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#MenuBook">
                <h5><span class="glyphicon glyphicon-book"></span> Book <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuBook">
                <li><a href="/book/register"><i class="glyphicon glyphicon-plus"></i> Add</a></li>
                <li><a href="/book/list_book"><i class="glyphicon glyphicon-th-list"></i> List </a></li>
                <li><a href="/book/search_book"><i class="glyphicon glyphicon-search"></i> Search </a></li>
              </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#MenuPerson">
              <h5><span class="glyphicon glyphicon-user"></span> Account <i class="glyphicon glyphicon-chevron-down"></i></h5>
            </a>
            <ul class="list-unstyled collapse in" id="MenuPerson">
              <li><a href="/person/register"><i class="glyphicon glyphicon-plus"></i> Add</a></li>
              <li><a href="/person/list_user"><i class="glyphicon glyphicon-th-list"></i> List </a></li>
              <li><a href="/person/search_user"><i class="glyphicon glyphicon-search"></i> Search </a></li>
            </ul>
          </li>
        </ul>

        <hr>    
        
      </div><!-- /col-3 -->

      <div class="col-md-10">
        <div class="row">
          <div class="col-xs-6 col-md-2"></div>
          <div class="col-xs-6 col-md-8">
            <center><strong><h1>Edit Member</h1></strong></center>
              <form action="{{ url('/person/save_edit')}}" name="frmEdit" method="post">
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Edit Profile</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 col-md-12">

                        <label for="UserID" class="col-md-4 control-label ">UserID</label>
                      <div class="col-md-8 form-group">
                        <label for="UserID">{{$User->id}}</label>
                      </div>

                        <label for="txtUsername" class="col-md-4 control-label ">Username</label>
                      <div class="col-md-8 form-group">
                        <input name="txtUsername" type="text" class="form-control" id="txtUsername" placeholder="Username" value="{{$User->Username}}">
                      </div>

                       <label for="txtPassword" class="col-md-4 control-label ">Password</label>
                      <div class="col-md-8 form-group">
                        <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="Password" value="{{$User->Password}}">
                      </div>

                      <label for="txtConPassword" class="col-md-4 control-label ">Confirm Password</label>
                      <div class="col-md-8 form-group">
                        <input name="txtConPassword" type="password" class="form-control" id="txtConPassword" placeholder="Confirm Password" value="{{$User->Password}}">
                      </div>

                      <label for="txtName" class="col-md-4 control-label">Name</label>
                      <div class="col-md-8 form-group">
                        <input name="txtName" type="text" class="form-control" id="txtName" placeholder="Name" value="{{$User->Name}}">
                      </div>

                      <label for="txtSurName" class="col-md-4 control-label">Surname</label>
                      <div class="col-md-8 form-group">
                        <input name="txtSurName" type="text" class="form-control" id="txtSurName" placeholder="Surname" value="{{$User->Surname}}">
                      </div>

                      <label for="txtAddress" class="col-md-4 control-label">Address/Office</label>
                      <div class="col-md-8 form-group">
                        <input name="txtAddress" type="text" class="form-control" id="txtAddress" placeholder="Address/Office" value="{{$User->Address}}">
                      </div>

                      <label for="txtEmail" class="col-md-4 control-label">E-mail</label>
                      <div class="col-md-8 form-group">
                        <input name="txtEmail" type="email" class="form-control" id="txtEmail" placeholder="E-mail" value="{{$User->Email}}">
                      </div>

                      <label for="txtPhone" class="col-md-4 control-label">Phone Number</label>
                      <div class="col-md-8 form-group">
                        <input name="txtPhone" type="text" class="form-control" id="txtPhone" placeholder="Phone Number" value="{{$User->Phone}}">
                      </div>

                      <label for="Status" class="col-md-4 control-label">Status</label>
                      <div class="col-md-8 form-group">
                      @if ($User->Status=='ADMIN')
                          <label for="Status">Librarian (บรรณารักษ์)</label>
                      @else
                          <label for="Status">Member (สมาชิก)</label>
                      @endif
                     </div>               

                    <label  class="col-md-4 control-label"></label>
                    <div class="col-md-8 form-group">
                      <button type="submit" name="Edit" value="Edit" class="btn btn-warning">Edit</button>
                      <button type="reset" name="Reset" value="Reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-xs-6 col-md-2"></div>
      </div>
    </div><!--/col-span-9-->
  </div>
</div>


<footer class="text-center">Power</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script>
</body>
</html>