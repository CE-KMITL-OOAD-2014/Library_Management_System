<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>ยืมหนังสือ</title>
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
            <center><strong><h1>Borrow Book : {{$Book->Title1}}</h1></strong></center>
              <form action="save_borrow_book?BookID={{$Book->id}}" name="frmEdit" method="post">
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Borrow Book Detail</strong></div>
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
                        <label for="Publishing">{{$Book->Edition}}/{{$Book->Year}}</label>
                      </div>

                     <label for="ISBN" class="col-md-4 control-label">ISBN/ISSN</label>
                     <div class="col-md-8 form-group">
                      <label for="ISBN">{{$Book->ISBN}}</label>
                    </div>

                    <label for="CallNum" class="col-md-4 control-label">Call Number</label>
                    <div class="col-md-8 form-group">
                      <label for="CallNum">{{$Book->CallNum}}</label>
                    </div>

                      <label for="txtUserBorrow" class="col-md-4 control-label">UserID Borrow</label>
                    <div class="col-md-8 form-group">
                      <input name="txtUserBorrow" type="text" class="form-control" id="txtUserBorrow" placeholder="UserID Borrow" value="{{$Book->UserBorrow}}">
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
                      <button type="submit" name="Borrow" value="Borrow" class="btn btn-success">Borrow</button>
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