<?php
  require_once('auth.php');

?>

<!DOCTYPE html>

<html>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <title>Welcome Alumni</title>

</head>

<body>

<!--NAVIGATION BAR START-->
  <?php require_once('navbar.php'); ?>
<!--NAVIGATION BAR END-->


  <div class="container">
    <div class="col-md-8  col-md-offset-2">

      <div class="row">
        <div class="col-md-12" align="center">

        <!--WELCOME PANEL START-->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Welcome <b><?php $username=$_SESSION['SESS_USERNAME']; echo $username; ?></b></h3>
            </div>
            <div class="panel-body">
              <p>You may use the navbar at the top to browse various links.<br>Once an alumni has logged in and updated their profile, that alumni will appear in the database. Public components of the profile like Name and Roll Number will be visible to all. Other details can be viewed if:<br>1. Two Alumni are from the same batch.<br>2. You send the other alumni a visibility request which he/she accepts.</p>
            	<br>
            <p>To help us and the alumni communicate better amongst each other, kindly keep your profile updated. Posts to the alumni blog can be submitted and will appear as a part of the blog once the admin approves them.</p>
            </div>
          </div>
          
        </div>
      </div>
      <!--WELCOME PANEL END-->


      <div class="row">

      <!--EVENTS PANEL START-->
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default" align="center">
            <div class="panel-heading">
              <h3>Events</h3>
            </div>
            <div class="panel-body">
               <?php
                  include 'upcoming_events.php'
                  ?>
              <br><br>
              <a href="allevents.php">View all events</a>
            </div>
          </div>
        </div>
      <!--EVENTS PANEL END-->

      </div>
    </div>
  </div>



  <!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
