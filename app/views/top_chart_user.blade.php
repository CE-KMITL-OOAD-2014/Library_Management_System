<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>หนังสือติด Top 10 - ระบบจัดการห้องสมุด (Library Management System)</title>
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
        <div class="col-md-2">
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
          <div class="col-xs-3"></div>
          <div class="col-xs-6">
            <center><strong><h1>รายชื่อหนังสือที่มีการยืมมากที่สุด 10 อันดับ</h1></strong></center>
              <div class="panel panel-success">
                <div class="panel-heading"><strong>Top Chart Detail</strong></div>
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

                      <?php
                        $chk = 0;
                        for($i=$Page_Start ;$i<($Page_Start+5);$i++){
                          $chk++;
                          if($i<$Num_Rows){
                      ?>
                        
                      <center>
                        <a href="detailbook?BookID={{$Book[$i]->id}}">
                          @if ($Book[$i]->Filename=='')
                          <img src= {{"/bookPicture/defaultBooks.jpg"}} class="img-rounded" width="300" height="200"> 
                          @else
                          <img src= {{"/bookPicture/".$Book[$i]->Filename}} class="img-rounded" width="300" height="200"> 
                          @endif
                        </a>                
                        <br>
                        <div align="center">อันดับที่ {{($i+1)." : ".$Book[$i]->Title1}}</div>
                        <br>
                      </center>                         
                          
                      <?php
                        }
                        if($i==9) break;
                        }
                      ?>

                        <center>
                          <strong>Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page
                            <nav>
                              <ul class="pagination">
                                <?php
                                  if($Prev_Page){
                                    echo " <li><a href='topchart?Page=$Prev_Page'><< Back</a></li> ";
                                  }
                                  for($i=1; $i<=$Num_Pages; $i++){
                                    if($i != $Page){
                                      echo "<li><a href='topchart?Page=$i'>$i</a></li>";
                                    }else{
                                      echo "<li class='active'><a><b> $i </b></a></li>";
                                    }
                                  }
                                  if($Page!=$Num_Pages){
                                    echo " <li><a href ='topchart?Page=$Next_Page'>Next>></a></li> ";
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
            <div class="col-xs-3"></div>
          </div>
        </div>
      </div>
    </div>

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