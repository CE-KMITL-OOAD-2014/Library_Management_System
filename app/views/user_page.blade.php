<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>ประวัติบัญชีผู้ใช้งาน</title>
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
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Member <span class="caret"></span></a>
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
            <strong><i class="glyphicon glyphicon-wrench"></i> Panal Service</strong></a>  

            <hr>

            <ul class="list-unstyled">
              <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#MenuBook">
                <h5><span class="glyphicon glyphicon-book"></span> Book <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuBook">
                <li><a href="/book/search_book"><i class="glyphicon glyphicon-search"></i> Search </a></li>
              </ul>
            </li>
            <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#MenuPerson">
              <h5><span class="glyphicon glyphicon-list-alt"></span> History <i class="glyphicon glyphicon-chevron-down"></i></h5>
            </a>
            <ul class="list-unstyled collapse in" id="MenuPerson">
              <li><a href="/book/booking_history"><i class="glyphicon glyphicon-th-list"></i> Booking List </a></li>
              <li><a href="/book/borrow_history"><i class="glyphicon glyphicon-th-list"></i> Borrow List </a></li>
            </ul>
          </li>
        </ul>

        <hr>    
        
      </div><!-- /col-3 -->

        <div class="col-md-10">
        <div class="row">
          <div class="col-xs-6 col-md-2"></div>
          <div class="col-xs-6 col-md-8">
            <center><strong><h1>Welcome to User Page!</h1></strong></center>
              <div class="panel panel-primary">
                <div class="panel-heading"><strong>Profile Member</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-6 col-md-12">
                        <label for="Username" class="col-md-4 control-label">Username</label>
                      <div class="col-md-8 form-group">
                        <label for="Username">{{$User->Username}}</label>
                      </div>

                      <label for="Name" class="col-md-4 control-label">Name</label>
                      <div class="col-md-8 form-group">
                        <label for="Name">{{$User->Name}}</label>
                      </div>

                      <label for="Surname" class="col-md-4 control-label">Surname</label>
                      <div class="col-md-8 form-group">
                        <label for="Surname">{{$User->Surname}}</label>
                      </div>

                      <label for="Address" class="col-md-4 control-label">Address</label>
                      <div class="col-md-8 form-group">
                        <label for="Address">{{$User->Address}}</label>
                      </div>

                      <label for="Email" class="col-md-4 control-label">E-mail</label>
                      <div class="col-md-8 form-group">
                        <label for="Email">{{$User->Email}}</label>
                      </div>

                      <label for="Phone" class="col-md-4 control-label">Phone Number</label>
                      <div class="col-md-8 form-group">
                        <label for="Phone">{{$User->Phone}}</label>
                      </div>

                      <label for="Status" class="col-md-4 control-label">Status</label>
                      <div class="col-md-8 form-group">
                      @if ($User->Status=='ADMIN')
                          <label for="Status">Librarian (บรรณารักษ์)</label>
                      @else
                          <label for="Status">Member (สมาชิก)</label>
                      @endif
                     </div>                 

                    <label  class="col-md-2 control-label"></label>
                    <div class="col-md-8 form-group">
                      <a href="edit"><button type="button" class="btn btn-warning btn-lg btn-block">Edit Profile</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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