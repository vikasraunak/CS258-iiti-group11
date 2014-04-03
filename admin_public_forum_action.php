
<?php 
/* 
 Create table in database: 
 CREATE TABLE pforum ( 
   pf_id int(10) NOT NULL auto_increment, 
   pf_name varchar(50) NOT NULL, 
   pf_title varchar(255) NOT NULL, 
   pf_ppost varchar(255) NOT NULL, 
   pf_aud varchar(20) NOT NULL, 
   pf_username varchar(20) NOT NULL, 
   pf_date timestamp(14) NOT NULL, 
   pfb_status int(1) DEFAULT 0 NOT NULL, 
   PRIMARY KEY (pr_id) 
 ) 
*/ 
include "connection.php"; 

IF ( (isset($_POST['name'])    AND trim($_POST['name']) <> "") AND (isset($_POST['title'])    AND trim($_POST['title']) <> "") 
 AND (isset($_POST['roll']) AND trim($_POST['roll']) <> "") AND (isset($_POST['ppost']) AND trim($_POST['ppost']) <> "") ): 
  
  IF (get_magic_quotes_gpc()) : 
    $name    = stripslashes($_POST['name']); 
    $post = stripslashes($_POST['ppost']); 
    $roll    = stripslashes($_POST['roll']); 
    $title = stripslashes($_POST['title']); 
  ENDIF; 

  // Adds the new entry to the database 
  $sql  = " INSERT INTO `pforum` "; 
  $sql .= " SET `pr_name` = '$name', "; 
  $sql .= "     `pr_roll`= '$email' "; 
  $sql .= "     `pr_title` = '$roll', "; 
  $sql .= "     `pr_ppost`  = '$post' ";

  $qry = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

  // Acknowledge entry 
  print "<p><label for='name'>Thank you.Your post has been forwarded,<br>"; 
  print "<textarea >$name</textarea></p>"; 
ENDIF; 


?>
