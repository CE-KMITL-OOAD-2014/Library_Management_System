<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>ระบบจัดการห้องสมุด (Library Management System)</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  </head>

  <body>
    <style type="text/css">
      body {background-color:black}
    </style>
    <div class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Library Management System </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/person/register">REGISTER</a></li>
            <li><a href="/login">LOGIN</a></li>
            <li><a href="contact.html">CONTACT</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!--/.NAVBAR END-->
    <section id="home" class="text-center">
      <center>
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
          <div class="row">
            <div class="col-xs-12">
              <div class="carousel-inner">
                <div class="item active">
                  <img src="assets/img/library1.jpg" alt="" width="1484" height="630" />
                  <div class="carousel-caption" >
                    <h4 class="back-light">Que sera sera Whatever will be will be The future's not ours to see Que sera sera</h4>
                  </div>
                </div>
                <div class="item">
                  <img src="assets/img/library2.jpg" alt="" width="1484" height="430" />
                  <div class="carousel-caption ">
                    <h4 class="back-light">Que sera sera Whatever will be will be The future's not ours to see Que sera sera</h4>
                  </div>
                </div>
                <div class="item">
                  <img src="assets/img/library3.jpg" alt="" width="1484" height="630" />
                  <div class="carousel-caption ">
                    <h4 class="back-light">Que sera sera Whatever will be will be The future's not ours to see Que sera sera</h4>
                  </div>
                </div>
              </div>
              <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
              </ol>
            </div>
          </div>
        </div>
      </center>
    </section>

    <section id="home" class="text-center">
      <center>
        <a href="login">
          <img src= {{"/assets/img/Enter.gif"}} class="img-rounded"> 
        </a> 
      </center>
      <br>
    </section>

    <!--/.JUST-INTRO END-->
    <section id="footer-sec" >
      <div class="container">
        <div class="row  pad-bottom" >
          <div class="col-md-4">
            <h4> <strong>ABOUT LIBRARY</strong> </h4>
            <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="col-md-4">
            <h4> <strong>SOCIAL LINKS</strong> </h4>
            <p>
              <a href="#"><i class="fa fa-facebook-square fa-3x"  ></i></a>  
              <a href="#"><i class="fa fa-twitter-square fa-3x"  ></i></a>  
              <a href="#"><i class="fa fa-linkedin-square fa-3x"  ></i></a>  
              <a href="#"><i class="fa fa-google-plus-square fa-3x"  ></i></a>  
            </p>
          </div>
          <div class="col-md-4">
            <h4> <strong>OUR LOCATION</strong> </h4>
            <p>
               234/JK , The Wondre Land, <br />
               Newyork Street Junction  <br />
               JUST USA -10909094
            </p>
            <a href="#" class="btn btn-primary" >SEND QUERY</a>
          </div>
        </div>
      </div>
    </section>         
    <!--/.FOOTER END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="/assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="/assets/plugins/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="/assets/js/custom.js"></script>
  </body>
</html>
