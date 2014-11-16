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
            <div class="col-xs-12">
              @if($_GET["txtKeyword"]=="")
              <center><strong><h1>รายชื่อหนังสือทั้งหมด</h1></strong></center>
              @else
              <center><strong><h1>รายชื่อหนังสือจากการค้นหา : {{$_GET["txtKeyword"]}}</h1></strong></center>
              @endif
              <form action="delete" name="frmMain" method="post" OnSubmit="return onDelete();">
                <div class="panel panel-info">
                  <div class="panel-heading"><strong>List Book Detail</strong></div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <script language="JavaScript">
                          function ClickCheckAll(vol){
                            var i=1;
                            for(i=1;i<=document.frmMain.hdnCount.value;i++){
                              if(vol.checked == true){
                                eval("document.frmMain.chkDel"+i+".checked=true");
                              }else{
                                eval("document.frmMain.chkDel"+i+".checked=false");
                              }
                            }
                          }

                          function onDelete(){
                            if(confirm('Do you want to delete ?')==true){
                              return true;
                            }else{
                              return false;
                            }
                          }
                        </script>

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
                          <tr class="warning">
                            <th width="80"> <div align="center">BookID </div></th>
                            <th width="250"> <div align="center">Title(Thai) </div></th>
                            <th width="250"> <div align="center">Title(English) </div></th>
                            <th width="150"> <div align="center">ISBN </div></th>
                            <th width="120"> <div align="center">Status </div></th>
                            <th width="100"> <div align="center">ID Booking </div></th>
                            <th width="100"> <div align="center">ID Borrow </div></th>
                            <th width="100"> <div align="center">Date Borrow </div></th>
                            <th width="100"> <div align="center">Date Return </div></th>
                            <th width="100"> <div align="center">Borrow </div></th>
                            <th width="100"> <div align="center">Return </div></th>
                            <th width="100"> <div align="center">Add Books </div></th>
                            <th width="100">
                              <div align="center">Delete
                                <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
                              </div>
                            </th>
                          </tr>

                          <?php
                            $chk = 0;
                            for($i=$Page_Start ;$i<($Page_Start+5);$i++){
                              $chk++;
                              if($i<$Num_Rows){
                          ?>
                          <tr>
                            <td><div align="center">{{$Book[$i]->id}}</div></td>
                            <td><a href="detailbook?BookID={{$Book[$i]->id}}">{{$Book[$i]->Title1}}</a></td>
                            <td>{{$Book[$i]->Title2}}</td>
                            <td>{{$Book[$i]->ISBN}}</td>
                            @if ($Book[$i]->Status=='OnBookshelf')
                              <td align="center">On Bookshelf</td>
                            @elseif ($Book[$i]->Status=='Repair')
                              <td align="center">In Repair</td>
                            @else
                              <td align="center">{{$Book[$i]->Status}}</td>
                            @endif
                            <td align="center">{{$Book[$i]->UserBooking}}</td>
                            <td align="center">{{$Book[$i]->UserBorrow}}</td>
                            <td align="center">{{$Book[$i]->DateBorrow}}</td>
                            <td align="center">{{$Book[$i]->DateReturn}}</td>
                            @if ($Book[$i]->Status!='Borrow')
                            <td align="center"><a href="borrow_book?BookID={{$Book[$i]->id}}">Borrow</a></td>
                            @else 
                            <td align="center"><a> - </a></td>
                            @endif
                            <td align="center"><a href="return_book?BookID={{$Book[$i]->id}}">Return</a></td>
                            @if ($Book[$i]->NumBooks =='0')
                            <td align="center"><a href="add_numbook?BookID={{$Book[$i]->id}}">Add</a></td>
                            @else 
                            <td align="center"><a> - </a></td>
                            @endif
                            @if ($Book[$i]->NumBooks !='0')
                            <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $chk;?>" value="{{$Book[$i]->id}}"></td>
                            @else 
                            <td align="center"><a> - </a></td>
                            @endif
                          </tr>
                          <?php
                            }else break;
                            }
                          ?>
                        </table>

                        <center>
                          <button type="submit" name="btnDelete" value="Delete" class="btn btn-success">Delete</button>
                          <button type="reset" name="Reset" value="Reset" class="btn btn-danger">Reset</button>
                          <input type="hidden" name="hdnCount" value="<?php echo $chk;?>">
                        </center>
                        <br>
                        <center>
                          <strong>Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page
                            <nav>
                              <ul class="pagination">
                              <?php
                                if($Prev_Page){
                                  echo " <li><a href='search_book_list?Page=$Prev_Page&txtKeyword=$_GET[txtKeyword]&ddlType=$_GET[ddlType]'><< Back</a></li> ";
                                }
                                for($i=1; $i<=$Num_Pages; $i++){
                                  if($i != $Page){
                                    echo "<li><a href='search_book_list?Page=$i&txtKeyword=$_GET[txtKeyword]&ddlType=$_GET[ddlType]'>$i</a></li>";
                                  }else{
                                    echo "<li class='active'><a><b> $i </b></a></li>";
                                  }
                                }
                                if($Page!=$Num_Pages){
                                  echo " <li><a href ='search_book_list?Page=$Next_Page&txtKeyword=$_GET[txtKeyword]&ddlType=$_GET[ddlType]'>Next>></a></li> ";
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
              </form>
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
