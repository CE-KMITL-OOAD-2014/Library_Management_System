<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>หน้าหลักในส่วนของสมาชิก - ระบบจัดการห้องสมุด (Library Management System)</title>
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
        <center><strong><h1>หน้าหลักในส่วนของสมาชิก</h1></strong></center><br>
        <div class="row text-center pad-row  ">
          <div class="col-xs-4">
            <img class="img-circle" src="/assets/img/bookinghistory.jpg" alt="" width="200" hight="200">
            <h3><strong>Booking History</strong> </h3>
            <p>ประวัติการจองหนังสือของผู้ใช้งาน ซึ่งผู้ใช้งานสามารถตรวจสอบประวัติการจองหนังสือของตัวเองได้</p>
            <a href="/book/booking_history" class="btn btn-primary" >Clicks Details</a>
          </div>
          <div class="col-xs-4">
            <img class="img-circle" src="/assets/img/borrowhistory.jpg" alt="" width="200" hight="200">
            <h3><strong>Borrow History</strong> </h3>
            <p>ประวัติการยืมหนังสือของผู้ใช้งาน ซึ่งผู้ใช้งานสามารถตรวจสอบประวัติการยืมหนังสือของตัวเองได้</p>
            <a href="/book/borrow_history" class="btn btn-primary" >Clicks Details</a>
          </div>
          <div class="col-xs-4">
            <img class="img-circle" src="/assets/img/top10.jpg" alt="" width="200" hight="200">
            <h3><strong>Top Charts</strong></h3>
            <p>เป็นการจัดอันดับหนังสือที่มีผู้ใช้งานทำการยืมมากที่สุดใน 10 อันดับ</p>
            <a href="/book/topchart" class="btn btn-primary" >Clicks Details</a>
          </div>
        </div>

        <div class="row text-center pad-row  ">
          <div class="col-xs-2"></div>
          <div class="col-xs-4">
            <img class="img-circle" src="/assets/img/searchbook.jpg" alt="" width="200" hight="200">
            <h3><strong>Search</strong> </h3>
            <p>เป็นการสืบค้นหนังสือ ซึ่งการจอง ยืม ยืมต่อ ต้องทำการสืบค้นหนังสือก่อน</p>
            <a href="/book/search_book" class="btn btn-primary" >Clicks Details</a>
          </div>
          <div class="col-xs-4">
            <img class="img-circle" src="/assets/img/editprofile.jpg" alt="" width="200" hight="200">
            <h3><strong>Edit Profile</strong> </h3>
            <p>เป็นการแก้ไขข้อมูลส่วนตัวของผู้ใช้งาน ซึ่งรวมไปถึงการเปลี่ยนรหัสผ่านด้วย</p>
            <a href="/person/edit" class="btn btn-primary" >Click Details</a>
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