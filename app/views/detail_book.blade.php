<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>ข้อมูลจำเพาะของหนังสือ</title>
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
            <center><strong><h1>Book : {{$Book->Title1}}</h1></strong></center>
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Detail Book</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-6 col-md-12">
                      <label for="BookID" class="col-md-4 control-label">BookID</label>
                      <div class="col-md-8 form-group">
                        <label for="BookID">{{$Book->id}}</label>
                      </div>

                      <label for="NameThai" class="col-md-4 control-label">Title (Thai)</label>
                      <div class="col-md-8 form-group">
                        <label for="NameThai">{{$Book->Title1}}</label>
                      </div>

                      <label for="NameEng" class="col-md-4 control-label">Title (English)</label>
                      <div class="col-md-8 form-group">
                        <label for="NameEng">{{$Book->Title2}}</label>
                      </div>

                      <label for="Subject" class="col-md-4 control-label">Subject</label>
                      <div class="col-md-8 form-group">
                        <label for="Subject">{{$Book->Subject}}</label>
                      </div>

                      <label for="Author" class="col-md-4 control-label">Author</label>
                      <div class="col-md-8 form-group">
                        <label for="Author">{{$Book->Author}}</label>
                      </div>

                      <label for="Publishing" class="col-md-4 control-label">Publishing</label>
                      <div class="col-md-8 form-group">
                        <label for="Publishing">{{$Book->Publishing}}</label>
                      </div>

                      <label for="EditionYear" class="col-md-4 control-label">Edition/Year</label>
                      <div class="col-md-8 form-group">
                        <label for="EditionYear">{{$Book->Edition}}/{{$Book->Year}}</label>
                      </div>

                      <label for="Detail" class="col-md-4 control-label">Detail</label>
                      <div class="col-md-8 form-group">
                       <label for="Detail">{{$Book->Detail}}</label>
                     </div>

                     <label for="ISBN" class="col-md-4 control-label">ISBN/ISSN</label>
                     <div class="col-md-8 form-group">
                      <label for="ISBN">{{$Book->ISBN}}</label>
                    </div>

                    <label for="CallNum" class="col-md-4 control-label">Call Number</label>
                    <div class="col-md-8 form-group">
                      <label for="CallNum">{{$Book->CallNum}}</label>
                    </div>

                    <label for="Type" class="col-md-4 control-label">Type</label>
                    <div class="col-md-8 form-group">
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

                    <label for="SubType" class="col-md-4 control-label">SubType</label>
                    <div class="col-md-8 form-group">
                      @if ($Book->SubType==000)
                          <label for="SubType">Generalities (000)</label>
                      @elseif ($Book->SubType==100)
                          <label for="SubType">Philosophy (100)</label>
                      @elseif ($Book->SubType==200)
                          <label for="SubType">Religion (200)</label>
                      @elseif ($Book->SubType==300)
                          <label for="SubType">Social Sciences (300)</label>
                      @elseif ($Book->SubType==400)
                          <label for="SubType">Language (400)</label>
                      @elseif ($Book->SubType==500)
                          <label for="SubType">Science (500)</label>
                      @elseif ($Book->SubType==600)
                          <label for="SubType">Technology (600)</label>
                      @elseif ($Book->SubType==700)
                          <label for="SubType">Art & Recreation (700)</label>
                      @elseif ($Book->SubType==800)
                          <label for="SubType">Literature (800)</label>
                      @elseif ($Book->SubType==900)
                          <label for="SubType">Geograph & History (900)</label>
                      @endif
                    </div>

                    <label for="Status" class="col-md-4 control-label">Status</label>
                    <div class="col-md-8 form-group">
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

                    <label  class="col-md-2 control-label"></label>
                    <div class="col-md-8 form-group">
                      <a href="checkbooking?BookID={{$Book->id}}"><button type="button" class="btn btn-warning btn-lg btn-block">Booking</button></a>
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