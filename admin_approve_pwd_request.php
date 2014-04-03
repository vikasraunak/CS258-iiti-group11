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
  FOREACH ($_POST['action'] as $pr_id => $thisACTION) : 
    IF ($thisACTION == "APP") : 
      $arrAPP[] = $gb_id; 
    ELSE : 
      $arrDEL[] = $gb_id; 
    ENDIF; 
  ENDFOREACH; 
  IF ($arrDEL) : 
    $sql_in = implode(",", $arrDEL); 
    $sql  = " DELETE FROM `p_reset` WHERE `pr_id` IN ($sql_in) "; 
    print $sql . "<hr>"; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 
  ENDIF; 
  IF ($arrAPP) : 
    $sql_in = implode(",", $arrAPP); 
    $sql  = " UPDATE `p_reset` SET `pr_status`=1 WHERE `pr_id` IN ($sql_in) "; 
    print $sql . "<hr>"; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 
  ENDIF; 
ENDIF; 

$sql  = " SELECT `pr_id`, `pr_name`, `pr_email`, DATE_FORMAT(`gb_date`, '%M %D, %Y at %H:%i') as `pr_date` FROM `p_reset` "; 
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
  print "<td><strong>" . $row['pr_email'] . "</strong>"; 
  print "<br>&nbsp;&nbsp;(Requested by " . $row['pr_name'] . " on " . $row['pr_date'] . ")</td>"; 
  print "</tr>"; 
ENDWHILE; 
print "</table>"; 
print "<input type='submit' name='submit_ap' value='Process'>"; 
print "</form>"; 
?>