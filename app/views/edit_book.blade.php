<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>แก้ไขข้อมูลหนังสือ</title>
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
            <center><strong><h1>Edit Detail : {{$Book->Title1}}</h1></strong></center>
              <form action="save_edit_book?BookID={{$Book->id}}" name="frmEdit" method="post">
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Edit Detail</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-6 col-md-12">
                      <label for="txtBookID" class="col-md-4 control-label">BookID</label>
                      <div class="col-md-8 form-group">
                        <input name="txtBookID" type="text" class="form-control" id="txtBookID" placeholder="BookID" value="{{$Book->id}}">
                      </div>

                      <label for="txtNameThai" class="col-md-4 control-label">Title (Thai)</label>
                      <div class="col-md-8 form-group">
                        <input name="txtNameThai" type="text" class="form-control" id="txtNameThai" placeholder="Title (Thai)" value="{{$Book->Title1}}">
                      </div>

                      <label for="txtNameEng" class="col-md-4 control-label">Title (English)</label>
                      <div class="col-md-8 form-group">
                        <input name="txtNameEng" type="text" class="form-control" id="txtNameEng" placeholder="Title (English)" value="{{$Book->Title2}}">
                      </div>

                      <label for="txtSubject" class="col-md-4 control-label">Subject</label>
                      <div class="col-md-8 form-group">
                        <input name="Subject" type="text" class="form-control" id="Subject" placeholder="Subject" value="{{$Book->Subject}}">
                      </div>

                      <label for="txtAuthor" class="col-md-4 control-label">Author</label>
                      <div class="col-md-8 form-group">
                        <input name="txtAuthor" type="text" class="form-control" id="txtAuthor" placeholder="Author" value="{{$Book->Author}}">
                      </div>

                      <label for="txtPublishing" class="col-md-4 control-label">Publishing</label>
                      <div class="col-md-8 form-group">
                        <input name="txtPublishing" type="text" class="form-control" id="txtPublishing" placeholder="Publishing" value="{{$Book->Publishing}}">
                      </div>

                      <label for="txtEditionYear" class="col-md-4 control-label">Edition/Year</label>
                      <div class="col-md-8 form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <input name="txtEdition" type="text" class="form-control" id="txtEdition" placeholder="Edition" value="{{$Book->Edition}}">
                          </div>
                          <div class="col-md-6">
                            <input name="txtYear" type="text" class="form-control" id="txtYear" placeholder="Year" value="{{$Book->Year}}">
                          </div>
                        </div>
                      </div>

                      <label for="txtDetail" class="col-md-4 control-label">Detail</label>
                      <div class="col-md-8 form-group">
                        <input name="txtDetail" type="text" class="form-control" id="txtDetail" placeholder="Detail" value="{{$Book->Detail}}">
                     </div>

                     <label for="txtISBN" class="col-md-4 control-label">ISBN/ISSN</label>
                     <div class="col-md-8 form-group">
                      <input name="txtISBN" type="text" class="form-control" id="txtISBN" placeholder="ISBN/ISSN" value="{{$Book->ISBN}}">
                    </div>

                    <label for="txtCallNum" class="col-md-4 control-label">Call Number</label>
                    <div class="col-md-8 form-group">
                      <input name="txtCallNum" type="text" class="form-control" id="txtCallNum" placeholder="Call Number" value="{{$Book->CallNum}}">
                    </div>

                    <label for="ddlType" class="col-md-4 control-label">Type</label>
                    <div class="col-md-8 form-group">
                      <select name="ddlType" id="ddlType" class="form-control">
                      @if ($Book->Type==000)
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
                      @elseif ($Book->Type==100)
                        <option value="100">Philosophy (100)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==200)
                        <option value="200">Religion (200)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==300)
                        <option value="300">Social Sciences (300)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==400)
                        <option value="400">Language (400)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==500)
                        <option value="500">Science (500)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==600)
                        <option value="600">Technology (600)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==700)
                        <option value="700">Art & Recreation (700)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==800)
                        <option value="800">Literature (800)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->Type==900)
                        <option value="900">Geograph & History (900)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                      @endif
                      </select>
                    </div>

                    <label for="SubType" class="col-md-4 control-label">SubType</label>
                    <div class="col-md-8 form-group">
                    <select name="ddlSubType" id="ddlSubType" class="form-control">
                    @if ($Book->SubType==000)
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
                      @elseif ($Book->SubType==100)
                        <option value="100">Philosophy (100)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==200)
                        <option value="200">Religion (200)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==300)
                        <option value="300">Social Sciences (300)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==400)
                        <option value="400">Language (400)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==500)
                        <option value="500">Science (500)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==600)
                        <option value="600">Technology (600)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==700)
                        <option value="700">Art & Recreation (700)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="800">Literature (800)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==800)
                        <option value="800">Literature (800)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="900">Geograph & History (900)</option>
                      @elseif ($Book->SubType==900)
                        <option value="900">Geograph & History (900)</option>
                        <option value="000">Generalities (000)</option>
                        <option value="100">Philosophy (100)</option>
                        <option value="200">Religion (200)</option>
                        <option value="300">Social Sciences (300)</option>
                        <option value="400">Language (400)</option>
                        <option value="500">Science (500)</option>
                        <option value="600">Technology (600)</option>
                        <option value="700">Art & Recreation (700)</option>
                        <option value="800">Literature (800)</option>
                      @endif
                      </select>
                    </div>

                    <label for="ddlStatus" class="col-md-4 control-label">Status</label>
                    <div class="col-md-8 form-group">
                       <select name="ddlStatus" id="ddlStatus" class="form-control">
                      @if ($Book->Status=='OnBookshelf')
                        <option value="OnBookshelf">On Bookshelf</option>
                        <option value="Borrow">Borrow</option>
                        <option value="Booking">Booking</option>
                        <option value="Repair">In Repair</option>
                      @elseif ($Book->Status=='Borrow')
                        <option value="Borrow">Borrow</option>
                        <option value="OnBookshelf">On Bookshelf</option>
                        <option value="Booking">Booking</option>
                        <option value="Repair">In Repair</option>
                      @elseif ($Book->Status=='Booking')
                        <option value="Booking">Booking</option>
                        <option value="OnBookshelf">On Bookshelf</option>
                        <option value="Borrow">Borrow</option>
                        <option value="Repair">In Repair</option>
                      @elseif ($Book->Status=='Repair')
                        <option value="Repair">In Repair</option>
                        <option value="OnBookshelf">On Bookshelf</option>
                        <option value="Borrow">Borrow</option>
                        <option value="Booking">Booking</option>
                      @endif
                      </select>
                    </div>

                      <label for="txtUserBorrow" class="col-md-4 control-label">UserID Borrow</label>
                    <div class="col-md-8 form-group">
                      <input name="txtUserBorrow" type="text" class="form-control" id="txtUserBorrow" placeholder="UserID Borrow" value="{{$Book->UserBorrow}}">
                    </div>

                      <label for="txtUserBooking" class="col-md-4 control-label">UserID Booking</label>
                    <div class="col-md-8 form-group">
                      <input name="txtUserBooking" type="text" class="form-control" id="txtUserBooking" placeholder="UserID Booking" value="{{$Book->UserBooking}}">
                    </div>

                      <label for="txtDateBorrow" class="col-md-4 control-label">Date Borrow</label>
                    <div class="col-md-8 form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <select name="sD1" id="sD1" class="form-control">
                            <?php
                            for($i=0;$i<=31;$i++){
                            $i2=sprintf("%02d",$i); // ฟอร์แมตรูปแบบให้เป็น 00
                            if($i2 == "00"){
                            ?>
                            <option value="00">--Day--</option>
                            <?php
                          }else{
                            echo '<option value="'.$i2.'">'.$i2.'</option>';
                          }
                          }?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name='sM1' id='sM1' class="form-control">
                            <option value="00">--Month--</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name='sY1' id='sY1' class="form-control">
                            <?php
                            $xYear=date('Y'); // เก็บค่าปีปัจจุบันไว้ในตัวแปร
                            ?>
                            <option value="0000">--Year--</option>
                            <?php
                            for($i=0;$i<=10;$i++){
                            echo '<option value="'.($xYear-$i).'">'.($xYear-$i).'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                      <label for="txtDateReturn" class="col-md-4 control-label">Date Return</label>
                    <div class="col-md-8 form-group">
                      <div class="row">
                          <div class="col-md-4">
                            <select name="sD2" id="sD2" class="form-control">
                            <?php
                            for($i=0;$i<=31;$i++){
                            $i2=sprintf("%02d",$i); // ฟอร์แมตรูปแบบให้เป็น 00
                            if($i2 == "00"){
                            ?>
                            <option value="00">--Day--</option>
                            <?php
                          }else{
                            echo '<option value="'.$i2.'">'.$i2.'</option>';
                          }
                          }?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name='sM2' id='sM2' class="form-control">
                            <option value="00">--Month--</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <select name='sY2' id='sY2' class="form-control">
                            <?php
                            $xYear=date('Y'); // เก็บค่าปีปัจจุบันไว้ในตัวแปร
                            ?>
                            <option value="0000">--Year--</option>
                            <?php
                            for($i=0;$i<=10;$i++){
                            echo '<option value="'.($xYear-$i).'">'.($xYear-$i).'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
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
</form>
</body>
</html>