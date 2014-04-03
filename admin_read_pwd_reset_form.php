

<?php 
/* 
 Create table in database: 
 CREATE TABLE p_reset ( 
   pr_id int(10) NOT NULL auto_increment, 
   pr_name varchar(50) NOT NULL, 
   pr_email varchar(255) NOT NULL, 
   pr_dob varchar(20) NOT NULL, 
   pr_roll varchar(20) NOT NULL, 
   pr_date timestamp(14) NOT NULL, 
   gb_status int(1) DEFAULT 0 NOT NULL, 
   PRIMARY KEY (gb_id) 
 ) 
*/ 
include "connection.php"; 

IF ( (isset($_POST['Name'])    AND trim($_POST['Name']) <> "") 
 AND (isset($_POST['email']) AND trim($_POST['email']) <> "") AND (isset($_POST['roll']) AND trim($_POST['roll']) <> "")
 AND (isset($_POST['dob']) AND trim($_POST['dob']) <> "")): 
  
  IF (get_magic_quotes_gpc()) : 
    $name    = stripslashes($_POST['Name']); 
    $email = stripslashes($_POST['email']); 
    $roll    = stripslashes($_POST['roll']); 
    $dob = stripslashes($_POST['dob']); 
  ENDIF; 

  // Adds the new entry to the database 
  $sql  = " INSERT INTO `guests` "; 
  $sql .= " SET `pr_name` = '$name', "; 
  $sql .= "     `pr_email`= '$email' "; 
  $sql .= "     `pr_roll` = '$roll', "; 
  $sql .= "     `pr_dob`  = '$dob' ";

  $qry = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

  // Acknowledge entry 
  print "<p><label for='name'>Thank you.Your request has been forwarded,<br>"; 
  print "<textarea >$name</textarea></p>"; 
ENDIF; 


?>