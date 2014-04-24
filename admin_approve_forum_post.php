
<html>
<head>
  <title>Approve Blog Posts</title>
</head>
<body>
<div align="center">
<a href="admin_home.php">Back to Admin Home</a>
<br>
<br>

<?php

include "admin_connection.php"; 
include "admin_auth.php";
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
    $qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con));
  ENDIF; 
  IF ($arrAPP) : 
    $sql_in = implode(",", $arrAPP); 
    $sql  = " UPDATE `pforum` SET `pf_status`=1 WHERE `pf_id` IN ($sql_in) "; 
    $qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con));
  ENDIF;
ENDIF; 

$sql  = " SELECT `pf_id`, `pf_name`,`pf_title`,`pf_ppost`, `pf_username`, DATE_FORMAT(`pf_date`, '%M %D, %Y at %H:%i') as `pf_date` FROM `pforum` "; 
$sql .= " WHERE `pf_status`=0 ORDER BY `pf_id` "; 
$qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 

print "List of Requests pending approval:<br>"; 
print "<form method='post' action='{$_SERVER['PHP_SELF']}'>"; 
print "<table border=1>"; 
  print "<tr>"; 
  print "<td>Approve</td>"; 
  print "<td>Remove</td>"; 
  print "<td width=1080>Forwarded Post</td>"; 
  print "</tr>"; 
WHILE ($row = mysqli_fetch_array($qry)) : 
  print "<tr>"; 
  print "<td><input type='radio' name='action[{$row['pf_id']}]' value='APP'></td>";
  print "<td><input type='radio' name='action[{$row['pf_id']}]' value='DEL'></td>";
  print "<td><strong>Title :" . $row['pf_title'] . "</strong>"; 
  print "<br>". "<strong>Main Post :</strong><br>".$row['pf_ppost'];
  print "<br>&nbsp;&nbsp;(Submitted by " . $row['pf_name'] . " on " . $row['pf_date'] . ")</td>"; 
  print "</tr>"; 
ENDWHILE; 
print "</table>"; 
print "<input type='submit' name='submit_ap' value='Process'>"; 
print "</form>"; 

?>

</div>
</body>
</html>
