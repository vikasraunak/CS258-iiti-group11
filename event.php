<html>
     <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LINK CSS FILES-->
        <link rel="stylesheet" type="text/css" href="css/general.css"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
          <title>
                 Show / Add Events
          </title>
     </head>
          <body>
          <!--NAVIGATION BAR START-->
      <?php require_once('navbar.php'); ?>
      <!--NAVIGATION BAR END-->
               <h2>
                   Show / Add Events
               </h2>
  <?php
     $mysql = mysql_connect("localhost", "root", "toor");
     mysql_select_db("alumni_website", $mysql) or die('Could not connect to the database.');
     if ($_POST)
     {
       $m = $_POST['m'];
       $d = $_POST['d'];
       $y = $_POST['y'];
       $inv_batch = $_POST['event_invite_batch'];
       $invite_dept=implode(',',$_POST['event_invite_dept']);
       $event_date = $y."-".$m."-".$d." ".$_POST["event_time_hh"].":".$_POST["event_time_mm"].":00";
       $insEvent_sql = "INSERT INTO calendar_events (event_title,event_venue, event_shortdesc, event_start,event_invite_batch,event_invite_dept) VALUES('".$_POST["event_title"]."','".$_POST["event_venue"]."','".$_POST["event_shortdesc"]."', '$event_date','".$_POST["event_invite_batch"]."','$invite_dept')";
       $insEvent_res = mysql_query($insEvent_sql) or die('Query failed.');
     }
     else
     {
       $m = $_GET['m'];
       $d = $_GET['d'];
       $y = $_GET['y'];
     }

     $getEvent_sql = "SELECT event_title, event_venue, event_shortdesc, date_format(event_start, '%l:%i %p') as fmt_date FROM calendar_events WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$y."' ORDER BY event_start";
     $getEvent_res = mysql_query($getEvent_sql) or die('Query failed.');
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
               <p><strong>Invitees:</br></strong>
                  <strong>Batch:&nbsp;&nbsp;&nbsp;</strong>
                          <input type=\"text\" name=\"event_invite_batch\" size=\"10\" maxlength=\"5\"/> </br>
                  <em><small>CSE</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"CSE\" />
                  <em><small>&nbsp;&nbsp;&nbsp;EE</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"EE\" />
                  <em><small>&nbsp;&nbsp;&nbsp;ME</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"ME\" /> </br>
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
/* Sends Mails checking the batch and the department code*/
 if($_POST)
 {
 $inv_batch = $_POST['event_invite_batch'];
 $invite_dept2 = explode("," , $invite_dept);
 
 $count = count($invite_dept2);

 $getDetail_sql0 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[0]."' ORDER by name";
 $getDetail_res0 = mysql_query($getDetail_sql0) or die('Query failed.');

if (mysql_num_rows($getDetail_res0) > 0)
{
while($detail_row = mysql_fetch_array($getDetail_res0))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";
   $retval = mail ($to,$subject,$message,$header);
  
  }
}

if($count>1) {
$getDetail_sql1 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[1]."' ORDER by name";
$getDetail_res1 = mysql_query($getDetail_sql1) or die('Query failed.');

if (mysql_num_rows($getDetail_res1) > 0)
 {
while($detail_row = mysql_fetch_array($getDetail_res1))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";

  }
 }
}

if($count>2) {
$getDetail_sql2 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[2]."' ORDER by name";
 $getDetail_res2 = mysql_query($getDetail_sql2) or die('Query failed.');

if (mysql_num_rows($getDetail_res2) > 0)
 {
while($detail_row = mysql_fetch_array($getDetail_res2))
  {
    $to = $detail_row['email'];
    $subject = "INVITATION";
    $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
    $header = "From: alumni@iiti.ac.in \r\n";
    $retval = mail ($to,$subject,$message,$header);

   }
  }
 }
}

  ?>
   <!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>
