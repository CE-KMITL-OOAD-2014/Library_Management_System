<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>รายชื่อหนังสือจากการค้นหา - ระบบจัดการห้องสมุด (Library Management System)</title>
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

        <div class="col-xs-10">
          <div class="row">
            <div class="col-xs-12">
              <center>
                <strong>
                  <h1>ค้นหา : 
                    @if ($_GET["ddlType"]==000) Generalities
                    @elseif ($_GET["ddlType"]==100) Philosophy
                    @elseif ($_GET["ddlType"]==200) Religion
                    @elseif ($_GET["ddlType"]==300) Social Sciences
                    @elseif ($_GET["ddlType"]==400) Language
                    @elseif ($_GET["ddlType"]==500) Science
                    @elseif ($_GET["ddlType"]==600) Technology
                    @elseif ($_GET["ddlType"]==700) Art & Recreation
                    @elseif ($_GET["ddlType"]==800) Literature
                    @elseif ($_GET["ddlType"]==900) Geograph & History
                    @endif
                  </h1>
                </strong>
              </center>
  
              <div class="panel panel-info">
                <div class="panel-heading"><strong>List Book Detail</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12">

                      <?php
                        $Num_Rows = 0;
                        foreach($Book as $key => $value){
                          $Num_Rows++;
                        }

                        $Per_Page = 5;   // Per Page

                        if(!isset($_GET["Page"])){
                          $Page=1;
                        }else{
                          $Page = $_GET["Page"];
                        }

                        $Prev_Page = $Page-1;
                        $Next_Page = $Page+1;
                        $Page_Start = (($Per_Page*$Page)-$Per_Page);

                        if($Num_Rows<=$Per_Page){
                          $Num_Pages =1;
                        }else if(($Num_Rows % $Per_Page)==0){
                          $Num_Pages =($Num_Rows/$Per_Page) ;
                        }else{
                          $Num_Pages =($Num_Rows/$Per_Page)+1;
                          $Num_Pages = (int)$Num_Pages;
                        }
                        ?>

                      <table class="table table-bordered">
                          <tr class="success">
                            <th width="80"> <div align="center">BookID </div></th>
                            <th width="200"> <div align="center">Title(Thai) </div></th>
                            <th width="200"> <div align="center">Title(English) </div></th>
                            <th width="100"> <div align="center">ISBN</div></th>
                            <th width="100"> <div align="center">Call Number</div></th>
                            <th width="120"> <div align="center">Type </div></th>
                            <th width="100"> <div align="center">Status </div></th>
                            <th width="80"> <div align="center">Booking </div></th> 
                          </tr>

                          <?php
                          $chk = 0;
                          for($i=$Page_Start ;$i<($Page_Start+5);$i++){
                            $chk++;
                            if($i<$Num_Rows){
                          ?>
                          <tr>
                            <td><div align="center">{{$Book[$i]->id}}</div></td>
                            <td><a href="detailbook?BookID={{$Book[$i]->id}}">{{$Book[$i]->Title1}}</td>
                            <td>{{$Book[$i]->Title2}}</td>
                            <td align="center">{{$Book[$i]->ISBN}}</td>
                            <td align="center">{{$Book[$i]->CallNum}}</td>
                            @if ($Book[$i]->Type==000)
                            <td align="center">Generalities</td>
                            @elseif ($Book[$i]->Type==100)
                            <td align="center">Philosophy</td>
                            @elseif ($Book[$i]->Type==200)
                            <td align="center">Religion</td>
                            @elseif ($Book[$i]->Type==300)
                            <td align="center">Social Sciences</td>
                            @elseif ($Book[$i]->Type==400)
                            <td align="center">Language</td>
                            @elseif ($Book[$i]->Type==500)
                            <td align="center">Science</td>
                            @elseif ($Book[$i]->Type==600)
                            <td align="center">Technology</td>
                            @elseif ($Book[$i]->Type==700)
                            <td align="center">Art & Recreation</td>
                            @elseif ($Book[$i]->Type==800)
                            <td align="center">Literature</td>
                            @elseif ($Book[$i]->Type==900)
                            <td align="center">Geograph & History</td>
                            @endif
                            @if ($Book[$i]->Status=='OnBookshelf')
                            <td align="center">On Bookshelf</td>
                            @elseif ($Book[$i]->Status=='Repair')
                            <td align="center">In Repair</td>
                            @else
                            <td align="center">{{$Book[$i]->Status}}</td>
                            @endif
                            @if ($Book[$i]->Status=='OnBookshelf')
                            <td align="center"><a href="checkbooking?BookID={{$Book[$i]->id}}">Booking</a></td>
                            @else
                            <td align="center">Null</td>
                            @endif
                          </tr>
                          <?php
                          }else break;
                        }
                        ?>
                      </table>
                      <center>
                        <strong>Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page
                          <nav>
                            <ul class="pagination">
                              <?php
                              if($Prev_Page){
                                echo " <li><a href='search_book_type_list?Page=$Prev_Page&ddlType=$_GET[ddlType]'><< Back</a></li> ";
                              }
                              for($i=1; $i<=$Num_Pages; $i++){
                                if($i != $Page){
                                  echo "<li><a href='search_book_type_list?Page=$i&ddlType=$_GET[ddlType]'>$i</a></li>";
                                }else{
                                  echo "<li class='active'><a><b> $i </b></a></li>";
                                }
                              }
                              if($Page!=$Num_Pages){
                                echo " <li><a href ='search_book_type_list?Page=$Next_Page&ddlType=$_GET[ddlType]'>Next>></a></li> ";
                              }
                              ?>
                            </ul>
                          </nav>
                        </strong>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
