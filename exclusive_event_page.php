<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LINK CSS FILES-->
    <link rel="stylesheet" type="text/css" href="css/general.css"> 
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <title>Event</title>
</head>
<body>
 <?php require_once('navbar.php');?>
<div class="container">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-info">
<div class="panel-heading">
    <h2><?php echo strtoupper($_GET['title']);?></h2>
</div>
<div class="panel-body">
<?php

require('connection.php');

$title=$_GET['title'];

$getEvent_sql = "SELECT event_title, event_venue, event_shortdesc,event_start, date_format(event_start, '%l:%i %p') as fmt_time, date_format(event_start, '%D %M %Y') as fmt_date, event_invite_batch, event_invite_dept, batch_lower, batch_upper FROM $table_cal WHERE event_title = '".$title."' ORDER BY event_start";
     $getEvent_res = mysqli_query($con,$getEvent_sql) or die('An error has occured!');
     if (mysqli_num_rows($getEvent_res) == 1 )
     {
         $event_txt = "";
         $ev = @mysqli_fetch_array($getEvent_res)  ;
         $event_title = stripslashes($ev["event_title"]);
         $event_venue = stripslashes($ev["event_venue"]);
         $event_shortdesc = stripslashes($ev["event_shortdesc"]);
         $fmt_time = $ev['fmt_time'];
         $fmt_date = $ev['fmt_date'];
         $inv_batch = $ev["event_invite_batch"];
         $inv_branch = $ev["event_invite_dept"];
         $batchlower = $ev["batch_lower"];
         $batchupper = $ev["batch_upper"];
         if(isset($inv_batch) && !empty($inv_batch))
         {
          $event_txt .= "<strong><em>Date:   </em></strong>".$fmt_date."</br><strong><em>Time:   </em></strong>".$fmt_time."<br/><strong><em>Venue:   </em></strong>".$event_venue."<br/><strong><em>Description:     </em></strong>".$event_shortdesc."<br/><strong><em>Invitees:     </em></strong>Batch - ".$inv_batch."<br>Department(s) - ".$inv_branch."" ;
          $event_txt .="";
         }
         else
         {
          $event_txt .= "<strong><em>Date:   </em></strong>".$fmt_date."</br><strong><em>Time:   </em></strong>".$fmt_time."<br/><strong><em>Venue:   </em></strong>".$event_venue."<br/><strong><em>Description:     </em></strong>".$event_shortdesc."<br/><strong><em>Invitees:     </em></strong>Batches - ".$batchlower." - ".$batchupper."<br>Department(s) - ".$inv_branch."" ;
          $event_txt .="";
         }

     }
     else
     {
         $event_txt = "";
     }

     if ($event_txt != "")
     {
          echo $event_txt;
     }
?>
</div>
</div>
</div>
</div>
</body>
</html>