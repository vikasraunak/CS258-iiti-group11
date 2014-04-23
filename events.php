<?php
    require('connection.php');
    require_once('auth.php');
    define("ADAY", (60*60*24));
    if ((isset($_POST['month'])) && (isset($_POST['year'])))
    {
      $month = $_POST['month'];
      $year = $_POST['year'];
    } 
    else
    {
      $nowArray = getdate();
      $month = $nowArray['mon'];
      $year = $nowArray['year'];
    }
    $start = mktime(12,0,0,$month,1,$year);
    $firstDayArray = getdate($start);
?>  


<html>
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LINK CSS FILES-->
        <link rel="stylesheet" type="text/css" href="css/general.css"> 
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
             <title>
                    <?php echo "Calendar: ".$firstDayArray['month']." ". $firstDayArray['year']; ?>
             </title>
      </head>

      <script type="text/javascript">
             function eventWindow(url) 
             {
                   event_popupWin = window.open(url, 'event', 'resizable=yes,scrollbars=yes,toolbar=no,width=400,height=400');
                   event_popupWin.opener = self;
             }
      </script>

      <body>

      <!--NAVIGATION BAR START-->
      <?php require_once('navbar.php'); ?>
      <!--NAVIGATION BAR END-->
            <div class="container" align="center">
            <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">

              <div class="panel-heading">
              <h2>View and Create Events</h2>
              <p>Select a month and year to view events scheduled. Click on a day to create an event.</p>
              </div>

              <div class="panel-body">
              <form method="post" class="form-inline" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              
                             <select class="form-control" name="month">
                             <?php
                                   $months = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                   for ($x=1; $x<=count($months); $x++)
                                   {
                                     echo '<option class="form-control" value="'.$x.'"';
                                     if ($x == $month)
                                     {
                                              echo " selected";
                                     }
                                     echo ">".$months[$x-1]."</option>";
                                   }
                             ?>
                             </select>

                             <select class="form-control" name="year">
                             <?php
                                  for ($x=2014; $x<=2050; $x++)
                                  {
                                    echo '<option class="form-control"';
                                    if ($x == $year)
                                    {
                                         echo " selected";
                                    }
                                    echo ">$x</option>";
                                  }
                             ?>
                             </select>

                             <button type="submit" type="submit" class="btn btn-primary" name="submit">Display Calendar</button>
</form>
<br>
<?php
$days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
echo '<table  class="table table-bordered table-condensed table-hover"><tr>';
foreach ($days as $day) {
    echo "<td style=\"background-color: #99CCFF; text-align: center; width: 14%\">
          <strong>$day</strong></td>\n";

}
for ($count=0; $count < (6*7); $count++) {
    $dayArray = getdate($start);
    if (($count % 7) == 0) {
        if ($dayArray["mon"] != $month) {
            break;
        } else {
            echo "</tr><tr>\n";
        }
    }
    if ($count < $firstDayArray["wday"] || $dayArray["mon"] != $month) {
        echo "<td> </td>\n";
    } else {
        $chkEvent_sql = "SELECT event_title FROM $table_cal WHERE month(event_start) = '".$month."' AND dayofmonth(event_start) = '".$dayArray["mday"]."' AND year(event_start) = '".$year."' ORDER BY event_start";
        $chkEvent_res = mysqli_query($con, $chkEvent_sql) or die(mysqli_error($con));
        if (mysqli_num_rows($chkEvent_res) > 0) {
            $event_title = "<br/>";
            while ($ev = mysqli_fetch_array($chkEvent_res, MYSQLI_ASSOC)) {

                $event_title .= stripslashes($ev["event_title"])."<br/>";
            }
            mysqli_free_result($chkEvent_res);
        } else {
            $event_title = "";
        }
        echo "<td valign=\"top\"><a href=\"event.php?m=".$month."&d=".$dayArray["mday"]."&y=$year\">".$dayArray["mday"]."</a><br/>".$event_title."</td>\n";
        unset($event_title);
        $start += ADAY;
    }
}
echo "</tr></table></div></div></div></div> ";
mysqli_close($con);
?>
<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
