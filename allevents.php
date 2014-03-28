 <html>
<head>
   <title>List of events Events</title>
</head>
<body>
 <h2 font-family: "tahoma" ><strong>List of events </strong></h2>
 <p>
 <?php
   require_once('upcoming_events.php');
   ?>                 </p>
<p> <h4 font-family: "tahoma"><strong>Past events :  </strong></h4>
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
$getEvent_sql = "SELECT event_title, event_venue, event_shortdesc FROM calendar_events WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$year."' ORDER BY event_start";
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

    </body>
</html>