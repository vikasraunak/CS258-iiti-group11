<?php 
include "connection.php"; 

if( (isset($_POST['Name'])    AND (trim($_POST['Name']) != "")) 
 AND (isset($_POST['email']) AND trim($_POST['email']) != "") AND (isset($_POST['roll']) AND trim($_POST['roll']) !="")
 AND (isset($_POST['dob']) AND trim($_POST['dob']) != "")) {
  
    $name    = stripslashes($_POST['Name']); 
    $email = stripslashes($_POST['email']); 
    $roll    = stripslashes($_POST['roll']); 
    $dob = stripslashes($_POST['dob']); 
  
  $sql  = " INSERT INTO `p_reset` "; 
  $sql .= " SET `pr_name` = '$name', "; 
  $sql .= "     `pr_email`= '$email' ,"; 
  $sql .= "     `pr_roll` = '$roll', "; 
  $sql .= "     `pr_dob`  = '$dob' ";
  
  $resultt=mysql_query($sql) or die(mysql_error());
  if($resultt==1){
    echo 'success';
  }else{
    echo 'failure';
  }

}
else{
  echo 'enter all fields correctly';
}
?>