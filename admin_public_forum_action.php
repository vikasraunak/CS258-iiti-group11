
<?php 

include "admin_connection.php"; 


IF ( (isset($_POST['name'])AND (isset($_POST['title']) 
 AND (isset($_POST['roll']) AND (isset($_POST['ppost']) ))))): 
  
    $name    = stripslashes($_POST['name']); 
    $post = stripslashes($_POST['ppost']); 
    $roll    = stripslashes($_POST['roll']); 
    $title = stripslashes($_POST['title']); 

  // Adds the new entry to the database 
  $sql = "INSERT INTO pforum (pf_name,pf_title,pf_username,pf_ppost) VALUES ('$name','$title','$roll','$post')";

  $qry = mysql_query($sql) or die("SQL Error: $sql<br>" . mysql_error()); 

  // Acknowledge entry 
  print "<p><label for='name'>Thank you.Your post has been forwarded, $name <br>"; 
ENDIF; 


?>

<br>
<br>
<br>

<a href="home.php">Go to Alumni home page..</a>
<br>