<?php 
// Change these to your own database settings 
/* 
$host = "localhost"; 
$user = "username"; 
$pass = "password"; 
$db = "database"; 
mysql_connect($host, $user, $pass) OR die ("Could not connect to the server."); 
mysql_select_db($db) OR die("Could not connect to the database."); 
*/ 
include "admin_connection.php"; 


IF (isset($_POST['submit_ap'])) : 
  $arrDEL = array(); 
  $arrAPP = array(); 
  FOREACH ($_POST['action'] as $pf_id => $thisACTION) : 
    IF ($thisACTION == "APP") : 
      $arrAPP[] = $pf_id; 
    ELSE : 
      $arrDEL[] = $pf_id; 
    ENDIF; 
  ENDFOREACH; 
  IF ($arrDEL) : 
    $sql_in = implode(",", $arrDEL); 
    $sql  = " DELETE FROM `pforum` WHERE `pf_id` IN ($sql_in) "; 
    print $sql . "<hr>"; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 
  ENDIF; 
  IF ($arrAPP) : 
    $sql_in = implode(",", $arrAPP); 
    $sql  = " UPDATE `pforum` SET `pf_status`=1 WHERE `pf_id` IN ($sql_in) "; 
    print $sql . "<hr>"; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 
  ENDIF; 
ENDIF; 

$sql  = " SELECT `pf_id`, `pf_name`, `pf_roll`, DATE_FORMAT(`gb_date`, '%M %D, %Y at %H:%i') as `pf_date` FROM `pforum` "; 
$sql .= " WHERE `pr_status`=0 ORDER BY `pr_id` "; 
$qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

print "List of Requests pending approval:<br>"; 
print "<form method='post' action='{$_SERVER['PHP_SELF']}'>"; 
print "<table border=1>"; 
  print "<tr>"; 
  print "<td>Approve</td>"; 
  print "<td>Remove</td>"; 
  print "<td>Request</td>"; 
  print "</tr>"; 
WHILE ($row = mysql_fetch_array($qry)) : 
  print "<tr>"; 
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='APP'></td>";
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='DEL'></td>";
  print "<td><strong>" . $row['pf_title'] . "</strong>"; 
  print "<textarea>".$row['pf_ppost']."</textarea>";
  print "<br>&nbsp;&nbsp;(Submitted by " . $row['pf_name'] . " on " . $row['pf_date'] . ")</td>"; 
  print "</tr>"; 
ENDWHILE; 
print "</table>"; 
print "<input type='submit' name='submit_ap' value='Process'>"; 
print "</form>"; 
?>