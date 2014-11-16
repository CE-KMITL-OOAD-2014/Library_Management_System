<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>ลงทะเบียนหนังสือ - ระบบจัดการห้องสมุด (Library Management System)</title>
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
              <center><strong><h1>ลงทะเบียนหนังสือ</h1></strong></center>
              <form name="form1" method="post" action="{{ url('/book/save_register') }}" enctype="multipart/form-data" >
                <div class="panel panel-info">
                  <div class="panel-heading"><strong>Please sign up</strong></div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <label for="txtNameThai" class="col-xs-4 control-label">Title (Thai)</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtNameThai" type="text" class="form-control" id="txtNameThai" placeholder="Title (Thai)" required autofocus>
                        </div>

                        <label for="txtNameEng" class="col-xs-4 control-label">Title (English)</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtNameEng" type="text" class="form-control" id="txtNameEng" placeholder="Title (English)" required autofocus>
                        </div>

                        <label for="txtSubject" class="col-xs-4 control-label">Subject</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtSubject" type="text" class="form-control" id="txtSubject" placeholder="Subject" required autofocus>
                        </div>

                        <label for="txtAuthor" class="col-xs-4 control-label">Author</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtAuthor" type="text" class="form-control" id="txtAuthor" placeholder="Author" required autofocus>
                        </div>

                        <label for="txtPublishing" class="col-xs-4 control-label">Publishing</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtPublishing" type="text" class="form-control" id="txtPublishing" placeholder="Publishing" required autofocus>
                        </div>

                        <label for="txtEditionYear" class="col-xs-4 control-label">Edition/Year</label>
                        <div class="col-xs-8 form-group">
                          <div class="row">
                            <div class="col-xs-6">
                              <input name="txtEdition" type="text" class="form-control" id="txtEdition" placeholder="Edition" required autofocus>
                            </div>
                            <div class="col-xs-6">
                              <input name="txtYear" type="text" class="form-control" id="txtYear" placeholder="Year" required autofocus>
                            </div>
                          </div>
                        </div>

                        <label for="txtDetail" class="col-xs-4 control-label">Detail</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtDetail" type="text" id="txtDetail" class="form-control" placeholder="Detail" required autofocus>
                        </div>

                        <label for="txtISBN" class="col-xs-4 control-label">ISBN/ISSN</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtISBN" type="text" id="txtISBN" class="form-control" placeholder="ISBN/ISSN" required autofocus>
                        </div>

                        <label for="txtCallNum" class="col-xs-4 control-label">Call Number</label>
                        <div class="col-xs-8 form-group">
                          <input name="txtCallNum" type="text" id="txtCallNum" class="form-control" placeholder="Call Number" required autofocus>
                        </div>

                        <label for="ddlType" class="col-xs-4 control-label">Type</label>
                        <div class="col-xs-8 form-group">
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

                        <label for="ddlStatus" class="col-xs-4 control-label">Status</label>
                        <div class="col-xs-8 form-group">
                          <select name="ddlStatus" id="ddlStatus" class="form-control">
                            <option value="OnBookshelf">On Bookshelf</option>
                            <option value="Borrow">Borrow</option>
                            <option value="Booking">Booking</option>
                            <option value="Repair">In Repair</option>
                          </select>
                        </div>

                        <label for="filename" class="col-xs-4 control-label">Picture</label>
                        <div class="col-xs-8 form-group">
                          <input type="file" class="flieinput" name="book_file" > 
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
