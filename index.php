<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  	<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  	<link href="css/carousel.css" rel="stylesheet">
  	<title>IIT Indore Alumni</title>
  	
</head>

<body>
		<?php require_once('navbar_main.php');?>


 <div id="myCarousel" class=" container carousel slide" data-ride="carousel">
      <!-- Indicators -->

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>


      <div class="carousel-inner">

        <div class="item active">
          <img src="./images/pic1.jpg" alt="First slide">
        </div>

        <div class="item">
          <img src="./images/pic1.jpg" alt="First slide">
        </div>

        <div class="item">
          <img src="./images/pic1.jpg" alt="First slide">
        </div>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    
    </div><!-- /.carousel -->


    <div class="container">
    	<div class="row">
    		<div class="col-md-12 panel panel-default">
    			<h2>Welcome Alumni</h2>
    			<p>You may login and browse through the alumni database. Don't forget to check out the Blog section for articles by fellow alumni.</p>
          <h2>News</h2>
          <p>No new news.</p>
          <h2>Other pages</h2>
          <p>
            <a href="http://iiti.ac.in"> IIT Indore Website</a><br>
            <a href="http://iiti.ac.in"> Student Gymkhana</a><br>
            <a href="http://iiti.ac.in"> IITI Hostel</a>
          </p>
    		</div>
    	</div>
    	
    </div>


<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../../assets/js/docs.min.js"></script>
<script src="js/holder.js"></script>
</body>
</html>
