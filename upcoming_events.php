<html>
<head>
   <title>Upcoming Events</title>
</head>
<body>
<?php

require('connection.php');

$nowarray = getdate();
$year = $nowarray['year'];
$pday = $nowarray['mday'];
$pmonth = $nowarray['mon'];
$flag= false;

for($m=$pmonth;$m<=12;$m++)
{
for($d=$pday+1;$d<=31;$d++)
{
$getEvent_sql = "SELECT event_title, event_venue, event_shortdesc FROM $table_cal WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$year."' ORDER BY event_start";
     $getEvent_res = mysqli_query($con,$getEvent_sql) or die('An error has occured!');
     if (mysqli_num_rows($getEvent_res) > 0)
     {
         $event_txt = "<ul>";
         while($ev = @mysqli_fetch_array($getEvent_res))
         {
           $event_title = stripslashes($ev["event_title"]);
           $event_txt .= "<li type=\"circle\">".$event_title."</br></li>";
         }
         $event_txt .="</ul>";
         mysqli_free_result($getEvent_res);
         }
         else 
         {
            $event_txt = "";
         }

          if($event_txt!="")
          {
          echo "<p align=\"left\"><em>$d/$m/$year 's Events:</em></p><a href=\"exclusive_event_page.php?title=".$event_title."\">$event_txt</a><hr/>";
          $flag=true;
          }

  }
 }
 if($flag==false)
 {echo 'No upcoming events';}

?>
    </body>
</html>