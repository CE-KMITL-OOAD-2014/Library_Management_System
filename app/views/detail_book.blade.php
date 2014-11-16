<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>ข้อมูลจำเพาะของหนังสือ - ระบบจัดการห้องสมุด (Library Management System)</title>
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

        <!-- Right column -->
        <div class="col-xs-10">
          <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
              <center><strong><h1>ข้อมูลจำเพาะของหนังสือ : {{$Book->Title1}}</h1></strong></center>
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Detail Book</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12">
                      <label for="filename" class="col-xs-4 control-label">Picture</label>
                      <div class="col-xs-8 form-group">
                        @if ($Book->Filename=='')
                        <img style = class="img-responsive" src= {{"/bookPicture/defaultBooks.jpg"}} class="img-rounded" width="150" height="150">
                        @else
                        <img style = class="img-responsive" src= {{"/bookPicture/".$Book->Filename}} class="img-rounded" width="150" height="150">
                        @endif
                      </div>

                      <label for="BookID" class="col-xs-4 control-label">BookID</label>
                      <div class="col-xs-8 form-group">
                        <label for="BookID">{{$Book->id}}</label>
                      </div>

                      <label for="NameThai" class="col-xs-4 control-label">Title (Thai)</label>
                      <div class="col-xs-8 form-group">
                        <label for="NameThai">{{$Book->Title1}}</label>
                      </div>

                      <label for="NameEng" class="col-xs-4 control-label">Title (English)</label>
                      <div class="col-xs-8 form-group">
                        <label for="NameEng">{{$Book->Title2}}</label>
                      </div>

                      <label for="Subject" class="col-xs-4 control-label">Subject</label>
                      <div class="col-xs-8 form-group">
                        <label for="Subject">{{$Book->Subject}}</label>
                      </div>

                      <label for="Author" class="col-xs-4 control-label">Author</label>
                      <div class="col-xs-8 form-group">
                        <label for="Author">{{$Book->Author}}</label>
                      </div>

                      <label for="Publishing" class="col-xs-4 control-label">Publishing</label>
                      <div class="col-xs-8 form-group">
                        <label for="Publishing">{{$Book->Publishing}}</label>
                      </div>

                      <label for="EditionYear" class="col-xs-4 control-label">Edition/Year</label>
                      <div class="col-xs-8 form-group">
                        <label for="EditionYear">{{$Book->Edition}}/{{$Book->Year}}</label>
                      </div>

                      <label for="Detail" class="col-xs-4 control-label">Detail</label>
                      <div class="col-xs-8 form-group">
                        <label for="Detail">{{$Book->Detail}}</label>
                      </div>

                      <label for="ISBN" class="col-xs-4 control-label">ISBN/ISSN</label>
                      <div class="col-xs-8 form-group">
                        <label for="ISBN">{{$Book->ISBN}}</label>
                      </div>

                      <label for="CallNum" class="col-xs-4 control-label">Call Number</label>
                      <div class="col-xs-8 form-group">
                        <label for="CallNum">{{$Book->CallNum}}</label>
                      </div>

                      <label for="Type" class="col-xs-4 control-label">Type</label>
                      <div class="col-xs-8 form-group">
                        @if ($Book->Type==000)
                            <label for="Type">Generalities (000)</label>
                        @elseif ($Book->Type==100)
                            <label for="Type">Philosophy (100)</label>
                        @elseif ($Book->Type==200)
                            <label for="Type">Religion (200)</label>
                        @elseif ($Book->Type==300)
                            <label for="Type">Social Sciences (300)</label>
                        @elseif ($Book->Type==400)
                            <label for="Type">Language (400)</label>
                        @elseif ($Book->Type==500)
                            <label for="Type">Science (500)</label>
                        @elseif ($Book->Type==600)
                            <label for="Type">Technology (600)</label>
                        @elseif ($Book->Type==700)
                            <label for="Type">Art & Recreation (700)</label>
                        @elseif ($Book->Type==800)
                            <label for="Type">Literature (800)</label>
                        @elseif ($Book->Type==900)
                            <label for="Type">Geograph & History (900)</label>
                        @endif
                      </div>

                      <label for="Status" class="col-xs-4 control-label">Status</label>
                      <div class="col-xs-8 form-group">
                        @if ($Book->Status=="OnBookshelf")
                            <label for="Status">On Bookshelf</label>
                        @elseif ($Book->Status=="Borrow")
                            <label for="Status">Borrow</label>
                        @elseif ($Book->Status=="Booking")
                            <label for="Status">Booking</label>
                        @elseif ($Book->Status=="Repair")
                            <label for="Status">In Repair</label>
                        @endif
                      </div>

                      <label  class="col-xs-2 control-label"></label>
                      <div class="col-xs-8 form-group">
                        <a href="checkbooking?BookID={{$Book->id}}"><button type="button" class="btn btn-warning btn-lg btn-block">Booking</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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