 <?php
  require_once('auth.php'); ?>

 <html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LINK CSS FILES-->
        <link rel="stylesheet" type="text/css" href="css/general.css"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"><head>


   <title>List of events Events</title>
</head>

<body>
<?php require_once('navbar.php');?>
<div class="container">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading"><h2>All Events</h2></div>
<div class="panel-body">
 <p>
 <?php
   require_once('upcoming_events.php');
   ?>                 </p>
<p> <h4><strong>Past events:  </strong></h4>
<?php

require_once('connection.php');
$nowarray = getdate();
$year = $nowarray['year'];
$pdate = $nowarray['mday'];
$pmonth = $nowarray['mon'];

for($m=1;$m<=$pmonth;$m++)
{
for($d=1;$d<=$pday;$d++)
{
$getEvent_sql = "SELECT event_title, event_venue, event_shortdesc FROM $table_cal WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$year."' ORDER BY event_start";
     $getEvent_res = mysql_query($getEvent_sql) or die('An error has occured!');
     if (mysql_num_rows($getEvent_res) > 0)
     {
         $event_txt = "<ul>";
         while($ev = @mysql_fetch_array($getEvent_res))
         {
           $event_title = stripslashes($ev["event_title"]);
           $event_txt .= "<li type=\"circle\">".$event_title."</br></li>";
         }
         $event_txt .="</ul>";
         mysql_free_result($getEvent_res);
         }
         else 
         {
            $event_txt = "";
         }

          if($event_txt!="")
          {
          echo "<p align=\"left\"><strong><em>$d/$m/$year 's Events:</em></strong></p><a href=\"exclusive_event_page.php?title=".$event_title."\">$event_txt</a><hr/>";
          }

  }
 }

?>   </p>
</div>
</div>
</div>
</div>
<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

    </body>
</html>