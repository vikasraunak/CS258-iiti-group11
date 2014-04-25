<?php
  require('admin_auth.php');
  require_once('connection.php');

   ?>

<html>
     <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LINK CSS FILES-->
        <link rel="stylesheet" type="text/css" href="css/general.css"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
          <title>
                 View or Create Event
          </title>
     </head>
          <body>
          <div class="container">

          <div class="row">
          <div class="col-md-6">
          <div class="well"><a href="admin_home.php"><span class="glyphicon glyphicon-home"></span> Back to Admin Home</a></div>
          <div class="panel panel-info">
          <div class="panel-heading"><h2>Events on this date</h2></div>
          <div class="panel-body">
          <!--NAVIGATION BAR START-->
      <!--NAVIGATION BAR END-->

  <?php
     require('connection.php');
       if ($_POST)
       {
       $m = $_POST['m'];
       $d = $_POST['d'];
       $y = $_POST['y'];
       $batchlower = $_POST['batch_lower'];
       $batchupper = $_POST['batch_upper'];
       $inv_batch = $_POST['event_invite_batch'];
       $title = $_POST['event_title'];
       if(empty($_POST['event_invite_dept']))
       {
       	echo'<div class="alert alert-danger">
         Please choose the branches to be invited
         </div>';
         $invite_dept="";
       }
       else
       {
          $invite_dept=implode(',',$_POST['event_invite_dept']);
       }
       $event_date = $y."-".$m."-".$d." ".$_POST["event_time_hh"].":".$_POST["event_time_mm"].":00";
       if( ($batchlower >= $batchupper && empty($inv_batch) ) || ($batchlower < $batchupper && !empty($inv_batch)) || empty($_POST["event_title"]) || empty($_POST['event_venue']) || empty($_POST['event_shortdesc'])  || empty($_POST['event_invite_dept']))
       {
         echo'<div class="alert alert-danger">
         <span class="glyphicon glyphicon-warning-sign"></span> Please fill in all details correctly
         </div>';
       }
       else
       {
           $insEvent_sql = "INSERT INTO calendar_events (event_title,event_venue, event_shortdesc, event_start,event_invite_batch,event_invite_dept,batch_lower,batch_upper) VALUES('".$_POST["event_title"]."','".$_POST["event_venue"]."','".$_POST["event_shortdesc"]."', '$event_date','".$_POST["event_invite_batch"]."','$invite_dept','$batchlower',$batchupper)";
           $insEvent_res = mysqli_query($con, $insEvent_sql) or die(mysqli_error($con));
            $getId_sql = "SELECT id FROM $table_cal WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$y."' AND  event_title = '".$title."' ";
          $getId_res = mysqli_query($con, $getId_sql) or die(mysqli_error($con));
          $id = @mysqli_fetch_array($getId_res, MYSQLI_ASSOC);
          header('Refresh: 5; URL=exclusive_event_page.php?id='.$id['id']);
          mysqlI_free_result($getId_res);

       }

     }
     else
     {
       $m = $_GET['m'];
       $d = $_GET['d'];
       $y = $_GET['y'];
     }
     $getEvent_sql = "SELECT event_title, event_venue, event_shortdesc, date_format(event_start, '%l:%i %p') as fmt_date FROM $table_cal WHERE month(event_start) = '".$m."' AND dayofmonth(event_start) = '".$d."' AND year(event_start) = '".$y."' ORDER BY event_start";
     $getEvent_res = mysqli_query($con, $getEvent_sql) or die(mysqli_error($con));

     if (mysqli_num_rows($getEvent_res) > 0)
     {
         $event_txt = "<ul>";
         while($ev = @mysqli_fetch_array($getEvent_res, MYSQLI_ASSOC))
         {
           $event_title = stripslashes($ev["event_title"]);
           $event_venue = stripslashes($ev["event_venue"]);
           $event_shortdesc = stripslashes($ev["event_shortdesc"]);
           $fmt_date = $ev["fmt_date"];
           $event_txt .= "<li><strong>".$fmt_date."</strong>: ".$event_title."<br/>".$event_venue."<br/>".$event_shortdesc."</li>";
         }
         $event_txt .="</ul>";
         mysqlI_free_result($getEvent_res);
     }
     else
     {
         $event_txt = "";
     }
     if ($event_txt != "" )
     {
          echo "<p><strong>$d/$m/$y 's Events:</strong></p>$event_txt<hr/>";

     }


     ?>
     </div>
     </div>
     </div>
     <div class="col-md-6">
     <div class="panel panel-info">
     <div class="panel-heading">
      <h2>Create event on this date</h2>
     </div>
     <div class="panel-body">

     <?php    echo "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">
               <p><strong>Event Title:</strong><br/>
                          <input type=\"text\" name=\"event_title\" size=\"25\" maxlength=\"30\"/>
               </p>
               <p><strong>Event Venue:</strong><br/>
                          <input type=\"text\" name=\"event_venue\" size=\"30\" maxlength=\"100\"/>
               </p>
               <p><strong>Event Description:<br/></strong<br/>
                          <input type=\"text\" name=\"event_shortdesc\" size=\"25\" maxlength=\"300\"/>
               </p>
               <p><strong>Invitees:</br></strong><p><em>Choose either a range of batches or type in a single batch to be invited. </em> </p>
                  <select name = \"batch_lower\">
                  " ;
                     for ($x=2013; $x<2050; $x++)
                                  {
                                    echo "<option value=\"$x\">$x</option>";
                                  }
                      echo
                        "
                        </select>     to
                  <select name = \"batch_upper\">";
                       for ($b=2014; $b<=2050; $b++)
                                  {
                                        echo "<option value =\"$b\">$b</option>";
                                  }

                       echo "
                       </select>
                  <strong></br></br>Batch:&nbsp;&nbsp;&nbsp;</strong>
                          <input type=\"text\" name=\"event_invite_batch\" size=\"10\" maxlength=\"5\"/> </br>
                  <em><small>CSE&nbsp;</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"CSE\" />
                  <em><small>&nbsp;&nbsp;&nbsp;EE&nbsp;</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"EE\" />
                  <em><small>&nbsp;&nbsp;&nbsp;ME&nbsp;</small></em><input type=\"checkbox\" name=\"event_invite_dept[]\" value=\"ME\" /> </br>
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
                                <input type=\"submit\" value='Submit' name=\"submitbtn\" onclick=\"this.disabled=true;this.form.submit();\">

              </form>";
// Sends Mails by checking the batch and the department code
 if($_POST && $invite_dept != "")
 {
 $inv_batch = $_POST['event_invite_batch'];
 $invite_dept2 = explode("," , $invite_dept);
 $batch_lower = $_POST["batch_lower"];
 $batch_upper = $_POST["batch_upper"];

 $count = count($invite_dept2);
 if(isset($inv_batch) && !empty($inv_batch))
 {
 $getDetail_sql0 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[0]."' ORDER by name";
 $getDetail_res0 = mysqli_query($con, $getDetail_sql0) or die('Query failed.');

if (mysqli_num_rows($getDetail_res0) > 0)
{
while($detail_row = mysqli_fetch_array($getDetail_res0, MYSQLI_ASSOC))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";
   $retval = mail ($to,$subject,$message,$header);
  
  }
}

if($count>1)
{
   $getDetail_sql1 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[1]."' ORDER by name";
   $getDetail_res1 = mysqli_query($con, $getDetail_sql1) or die('Query failed.');

if (mysqli_num_rows($getDetail_res1) > 0)
 {
while($detail_row = mysqli_fetch_array($getDetail_res1, MYSQLI_ASSOC))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";

  }
 }
}

if($count>2) 
{
  $getDetail_sql2 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[2]."' ORDER by name";
  $getDetail_res2 = mysqli_query($con, $getDetail_sql2) or die('Query failed.');

  if (mysqli_num_rows($getDetail_res2) > 0)
  {
     while($detail_row = mysqli_fetch_array($getDetail_res2, MYSQLI_ASSOC))
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
 
else
{
   for($inv_batch = $batch_lower ; $inv_batch <= $batch_upper ; $inv_batch++)
   {
       $getDetail_sql0 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[0]."' ORDER by name";
 $getDetail_res0 = mysqli_query($con, $getDetail_sql0) or die('Query failed.');

if (mysqli_num_rows($getDetail_res0) > 0)
{
while($detail_row = mysqli_fetch_array($getDetail_res0, MYSQLI_ASSOC))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";
   $retval = mail ($to,$subject,$message,$header);
  
  }
}

if($count>1)
{
   $getDetail_sql1 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[1]."' ORDER by name";
   $getDetail_res1 = mysqli_query($con, $getDetail_sql1) or die('Query failed.');

if (mysqli_num_rows($getDetail_res1) > 0)
 {
while($detail_row = mysqli_fetch_array($getDetail_res1, MYSQLI_ASSOC))
  {
    $to = $detail_row['email'];
   $subject = "INVITATION";
   $message = "Dear ".$detail_row['name'].",<br>You have been invited to the ".$_POST['event_title']."being held on ".$m."/".$d."/".$y." at ".$_POST['event_venue'] ;
   $header = "From: alumni@iiti.ac.in \r\n";

  }
 }
}

if($count>2) 
{
  $getDetail_sql2 = "SELECT name, email, batch, branch FROM alumni WHERE batch = '".$inv_batch."' AND branch = '".$invite_dept2[2]."' ORDER by name";
  $getDetail_res2 = mysqli_query($con, $getDetail_sql2) or die('Query failed.');

  if (mysqli_num_rows($getDetail_res2) > 0)
  {
     while($detail_row = mysqli_fetch_array($getDetail_res2, MYSQLI_ASSOC))
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
}

}

  ?>
   <!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </div>
  </div>
  </div>
  </div>
  </div>
 </body>
</html>
