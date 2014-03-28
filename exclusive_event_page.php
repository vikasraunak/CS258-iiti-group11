<?php

include 'connection.php';

$title=$_GET['title'];

$getEvent_sql = "SELECT event_title, event_venue, event_shortdesc,event_start, date_format(event_start, '%l:%i %p') as fmt_time, date_format(event_start, '%D %M %Y') as fmt_date, event_invite_batch, event_invite_dept FROM calendar_events WHERE event_title = '".$title."' ORDER BY event_start";
     $getEvent_res = mysql_query($getEvent_sql) or die('An error has occured!');
     if (mysql_num_rows($getEvent_res) == 1 )
     {
         $event_txt = "";
         $ev = @mysql_fetch_array($getEvent_res)  ;
         $event_title = stripslashes($ev["event_title"]);
         $event_venue = stripslashes($ev["event_venue"]);
         $event_shortdesc = stripslashes($ev["event_shortdesc"]);
         $fmt_time = $ev['fmt_time'];
         $fmt_date = $ev['fmt_date'];
         $inv_batch = $ev["event_invite_batch"];
         $inv_branch = $ev["event_invite_dept"];
          $event_txt .= "<strong><em>Date:   </em></strong>".$fmt_date."</br><strong><em>Time:   </em></strong>".$fmt_time."<br/><strong><em>Venue:   </em></strong>".$event_venue."<br/><strong><em>Description:     </em></strong>".$event_shortdesc."<br/><strong><em>Invitees:     </em></strong>Batch - ".$inv_batch."  Department(s) - ".$inv_branch."" ;

         $event_txt .="";
     }
     else
     {
         $event_txt = "";
     }

     if ($event_txt != "")
     {
          echo "<h2>".strtoupper($title)."</h2>$event_txt<hr/>";
     }
?>