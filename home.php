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

  <title>Welcome Alumni</title>

</head>

<body>

<!--NAVIGATION BAR START-->
  <?php require_once('navbar.php'); ?>
<!--NAVIGATION BAR END-->


  <div class="container">
    <div class="col-md-8">

      <div class="row">
        <div class="col-md-8" align="center">

        <!--WELCOME PANEL START-->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Welcome</h3>
            </div>
            <div class="panel-body">
              <p>Dear <b><?php $username=$_SESSION['SESS_USERNAME']; echo $username; ?></b></p>
              <p>You may use the navbar at the top to browse various links. Notifications will appear in the area on the right. The election portal would be active during elections.</p>
            </div>
          </div>
          
        </div>
      </div>
      <!--WELCOME PANEL END-->


      <div class="row">

      <!--EVENTS PANEL START-->
        <div class="col-md-4">
          <div class="panel panel-default" align="center">
            <div class="panel-heading">
              <h3 class="panel-title">Events</h3>
            </div>
            <div class="panel-body">
              No events
              <a href="events.php">View all events</a>
            </div>
          </div>     
        </div>
      <!--EVENTS PANEL END-->

      <!--ELECTION PORTAL START-->
        <div class="col-md-4" align="center">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Election Portal</h3>
            </div>
            <div class="panel-body">
              Next Election: [Fetch Date from Admin]
            </div>
          </div>  
        </div>
      <!--ELECTION PORTAL END-->

      </div>
    </div>

    <!--NOTIFICATION PANEL START-->
    <div class="col-md-4" align="center">
      <div class="panel panel-default">
        <div class="panel-heading">
         <h3 class="panel-title">Notifications</h3>
        </div>
        <div class="panel-body">
          No new notifications
        </div>
      </div>
    </div>
    <!--NOTIFICATION PANEL END-->
  </div>



  <!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
