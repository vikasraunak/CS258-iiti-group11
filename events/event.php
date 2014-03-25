<html>
     <head>
          <title>
                 Show / Add Events
          </title>
     </head>
          <body>
               <h1>
                   Show / Add Events
               </h1>
  <?php
     $mysql = mysql_connect("localhost", "root", "");
     mysql_select_db("alumni+website", $mysql) or die(mysql_error());
     if ($_POST)
     {
       $m = $_POST['m'];
       $d = $_POST['d'];
       $y = $_POST['y'];
       $event_date = $y."-".$m."-".$d." ".$_POST["event_time_hh"].":".$_POST["event_time_mm"].":00";
       $insEvent_sql = "INSERT INTO calendar_events (event_title,event_venue, event_shortdesc, event_start) VALUES('".$_POST["event_title"]."','".$_POST["event_venue"]."','".$_POST["event_shortdesc"]."', '$event_date')";
       $insEvent_res = mysql_query($insEvent_sql) or die(mysql_error());
     } 
     else
     {
       $m = $_GET['m'];
       $d = $_GET['d'];
       $y = $_GET['y'];
     }

     $getEvent_sql = "SELECT event_title, event_venue, event_shortdesc, date_format(event_start, '%l:%i %p') as fmt_date FROM calendar_events WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$y."' ORDER BY event_start";
     $getEvent_res = mysql_query($getEvent_sql) or die('An error has occured!');
     if (mysql_num_rows($getEvent_res) > 0)
     {
         $event_txt = "<ul>";
         while($ev = @mysql_fetch_array($getEvent_res))
         {
           $event_title = stripslashes($ev["event_title"]);
           $event_venue = stripslashes($ev["event_venue"]);
           $event_shortdesc = stripslashes($ev["event_shortdesc"]);
           $fmt_date = $ev["fmt_date"];
           $event_txt .= "<li><strong>".$fmt_date."</strong>: ".$event_title."<br/>".$event_venue."<br/>".$event_shortdesc."</li>";
         }
         $event_txt .="</ul>";
         mysql_free_result($getEvent_res);
         }
         else 
         {
            $event_txt = "";
         }
         mysql_close();
         if ($event_txt != "")
         {
             echo "<p><strong>$d/$m/$y 's Events:</strong></p>$event_txt<hr/>";
         }

         echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">
               <p><strong>Add Event:</strong><br/>
                         Complete the form below then press the submit button when you are done.
               </p>
               <p><strong>Event Title:</strong><br/>
                          <input type=\"text\" name=\"event_title\" size=\"25\" maxlength=\"30\"/>
               </p>
               <p><strong>Event Venue:</strong><br/>
                          <input type=\"text\" name=\"event_venue\" size=\"30\" maxlength=\"100\"/>
               </p>
               <p><strong>Event Description:<br/></strong<br/>
                          <input type=\"text\" name=\"event_shortdesc\" size=\"25\" maxlength=\"300\"/>
               </p>
               <p><strong>Event Time (hh:mm):</strong><br/>
                          <select name=\"event_time_hh\">";
                          for ($x=1; $x<=24; $x++)
                          {
                            echo "<option value=\"$x\">$x</option>";
                          }
                          echo
                           "</select> :
                                <select name=\"event_time_mm\">
                                      <option value=\"00\">00</option>
                                      <option value=\"15\">15</option>
                                      <option value=\"30\">30</option>
                                      <option value=\"45\">45</option>
                                </select>
                                <input type=\"hidden\" name=\"m\" value=\"".$m."\">
                                <input type=\"hidden\" name=\"d\" value=\"".$d."\">
                                <input type=\"hidden\" name=\"y\" value=\"".$y."\">
                                <br/><br/>
                                <input type=\"submit\" name=\"submit\" value=\"Add Event!\">
              </form>";
   ?>
 </body>
</html>
