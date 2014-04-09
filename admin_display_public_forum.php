<?php 

include "admin_connection.php"; 


$sql  = " SELECT `pf_id`, `pf_name`,`pf_title`,`pf_ppost`, `pf_username`, DATE_FORMAT(`pf_date`, '%M %D, %Y at %H:%i') as `pf_date` FROM `pforum` "; 
$sql .= " WHERE `pf_status`=1 ORDER BY `pf_id` "; 
$qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

print "List of Posts:<br>"; 
print "<table border=5>"; 
  print "<tr>"; 
  print "<td width =1080>Main Post</td>";
  print "</tr>"; 
while($row = mysql_fetch_array($qry)){
  print "<tr>"; 
  print "<td><strong> Title :" . $row['pf_title'] . "</strong>"; 
  print "<br>&nbsp;&nbsp;Post : " . $row['pf_ppost']."</br>"; 
  print "<br>&nbsp;&nbsp;Submitted by " . $row['pf_name'] . " on " . $row['pf_date'] . "</td>"; 
  print "</tr>"; 
}
print "</table>"; 
?>