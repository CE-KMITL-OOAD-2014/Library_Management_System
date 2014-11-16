<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>ค้นหาหนังสือ - ระบบจัดการห้องสมุด (Library Management System)</title>
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
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Member <span class="caret"></span></a>
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
          <strong><a href="/main"><i class="glyphicon glyphicon-wrench"></i> Panal Service</strong></a>   
          <hr>
          <ul class="list-unstyled">
            <li class="nav-header"> 
              <a href="#" data-toggle="collapse" data-target="#MenuBook">
                <h5><span class="glyphicon glyphicon-book"></span> Book <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuBook">
                <li><a href="/book/search_book"><i class="glyphicon glyphicon-search"></i> Search </a></li>
                <li><a href="/book/search_book_type"><i class="glyphicon glyphicon-search"></i> Search (Type) </a></li>
                <li><a href="/book/topchart"><i class="glyphicon glyphicon-stats"></i> Top 10 </a></li>
              </ul>
            </li>
            <li class="nav-header"> 
              <a href="#" data-toggle="collapse" data-target="#MenuPerson">
                <h5><span class="glyphicon glyphicon-list-alt"></span> History <i class="glyphicon glyphicon-chevron-down"></i></h5>
              </a>
              <ul class="list-unstyled collapse in" id="MenuPerson">
                <li><a href="/book/booking_history"><i class="glyphicon glyphicon-th-list"></i> Booking List </a></li>
                <li><a href="/book/borrow_history"><i class="glyphicon glyphicon-th-list"></i> Borrow List </a></li>
              </ul>
            </li>
          </ul>
          <hr>    
        </div> 

        <!-- Left column -->
        <div class="col-xs-10">
          <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
              <center><strong><h1>ค้นหาหนังสือ</h1></strong></center>
              <form action="search_book_type_list" name="frmSearch" method="get">
                <div class="panel panel-info">
                  <div class="panel-heading"><strong>Search Book Detail</strong></div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <label for="ddlType" class="col-xs-4 control-label ">Type</label>
                        <div class="col-xs-8">
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
                        </div>
                        <br><br>

                        <label  class="col-xs-4 control-label"></label>
                        <div class="col-xs-8 form-group">
                          <button type="submit" name="Search" value="Search" class="btn btn-success">Search</button>
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

