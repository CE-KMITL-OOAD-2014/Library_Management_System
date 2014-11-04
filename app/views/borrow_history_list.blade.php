<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>รายการการยืมหนังสือของผู้ใช้งาน</title>
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
          <div class="col-xs-6 col-md-1"></div>
          <div class="col-xs-6 col-md-10">
           <center><strong><h1>User's Borrow Book Lists</h1></strong></center>
              <div class="panel panel-info">
                <div class="panel-heading"><strong>Borrow Book Lists Detail</strong></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 col-md-12">

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
                            <th width="100"> <div align="center">ISBN </div></th>
                            <th width="100"> <div align="center">Call Number</div></th>
                            <th width="100"> <div align="center">Type </div></th>
                            <th width="120"> <div align="center">Status </div></th>
                            <th width="150"> <div align="center">Date Borrow </div></th>
                            <th width="150"> <div align="center">Date Return </div></th>
                            <th width="100"> <div align="center">Renew </div></th>
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
                              <td align="center">{{$Book[$i]->DateBorrow}}</a></td>
                              <td align="center">{{$Book[$i]->DateReturn}}</a></td>
                              <td align="center"><a href="BorrowCon?BookID={{$Book[$i]->id}}">Renew</a></td>
                          </tr>
                          <?php
                          }else break;
                        }
                        ?>
                      </table>

                      <center><strong>Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page
                    
                    <nav>
                      <ul class="pagination">
                      <?php
                      if($Prev_Page){
                        echo " <li><a href='borrow_history_list?Page=$Prev_Page'><< Back</a></li> ";
                      }
                      for($i=1; $i<=$Num_Pages; $i++){
                        if($i != $Page){
                          echo "<a href='borrow_history_list?Page=$i'>$i</a></li>";
                        }else{
                          echo "<li class='active'><a><b> $i </b></a></li>";
                        }
                      }
                      if($Page!=$Num_Pages){
                        echo " <a href ='borrow_history_list?Page=$Next_Page'>Next>></a></li> ";
                      }
                      ?>
                      </ul>
                    </nav>
                      </strong></center>

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