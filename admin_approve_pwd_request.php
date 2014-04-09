<?php 

include "fetchprofile.php"; 


function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  

if(isset($_POST['submit_ap'])){
  $arrDEL = array(); 
  $arrAPP = array(); 
  foreach($_POST['action'] as $pr_id => $thisACTION){
    if($thisACTION == "APP"){
      $arrAPP[] = $pr_id;
      $arrDEL[] = $pr_id;
      }
    else{
      $arrDEL[] = $pr_id; 
    }
  }
  if($arrAPP){
    $sql_in = implode(",", $arrAPP); 
    $sql  = " UPDATE `p_reset` SET `pr_status`=1 WHERE `pr_id` IN ($sql_in) "; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

    $sql  = "SELECT `pr_branch`,`pr_email`,`pr_roll` FROM `p_reset` WHERE `pr_status`=1 ";
    $qry  = mysql_query($sql) or die('failure in running sql query');
    while($arr  = mysql_fetch_assoc($qry)){
      $usrnam = $arr['pr_branch'].$arr['pr_roll'];
      $pwd=RandomPass(10);
      $sql2="UPDATE `alumni` SET `password`='$pwd' WHERE `username`='$usrnam' ";
      $qr2=mysql_query($sql2) or die("$usrnam could not found");
      $to=$arr['pr_email'];
      $headers='From: admin@alumni.iiti.ac.in';
      $sub='Password Reset at IITI alumni';
      $body="Hi\n Your alumni website username is : $usrnam \nYour alumni website password is :$pwd \n Please update your credentials after login.\n Thanks. \n IITI alumni team.";
      $retval=mail($to,$sub,$body,$headers) or die('Could not send mail');
      if($retval ==1){
        echo "mail sent to $to successfully..";
        print "<br>";
      }
      else{
        echo "failed to send mail..";
        print "<br>";
      }
    }
  }

  if($arrDEL){
    $sql_in = implode(",", $arrDEL); 
    $sql  = " DELETE FROM `p_reset` WHERE `pr_id` IN ($sql_in) "; 
    $qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 
  } 
}
print "<br>";

$sql  = " SELECT `pr_id`,`pr_dob`,`pr_branch`,`pr_roll`,`pr_name`, `pr_email`, DATE_FORMAT(`pr_date`, '%M %D, %Y at %H:%i') as `pr_date` FROM `p_reset` "; 
$sql .= " WHERE `pr_status`=0 ORDER BY `pr_id` "; 
$qry  = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

print "List of Requests pending approval:<br>"; 
print "<form method='post' action='{$_SERVER['PHP_SELF']}'>"; 
print "<table border=1>"; 
  print "<tr>"; 
  print "<td>Approve</td>"; 
  print "<td>Remove</td>"; 
  print "<td>Request By</td>"; 
  print "<td>Entered Form Inputs</td>"; 
  print "<td>Data Stored in Database</td>"; 
  print "</tr>"; 


while($row = mysql_fetch_array($qry)){
  print "<tr>"; 
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='APP'></td>";
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='DEL'></td>";
  print "<td><strong>" . $row['pr_email'] . "</strong>"; 
  print "<br>&nbsp;&nbsp;(Requested by " . $row['pr_name'] . " on " . $row['pr_date'] . ")</td>"; 
  print "<td><strong>" ."Username :". $row['pr_roll'] . "</strong>" ."<br>"."<strong>" . "Date Of Birth :". $row['pr_dob'] . "</strong>" . "</td>"; 
  // These results must be queried from the database alumni : Have to put the search and then print inside the table
  fetchprofile($row['pr_branch'].$row['pr_roll'],0);

  print "<td><strong>" ."Username :". $row['pr_branch'].$row['pr_roll'] . "</strong>" ."<br>"."<strong>" . "Date Of Birth :</strong>" . "</td>"; 

  print "</tr>"; 
} 

print "</table>";
mysql_close($con); 

print "<input type='submit' name='submit_ap' value='Process'>"; 
print "</form>"; 
?>
