
<?php 
require 'admin_auth.php';
require("admin_connection.php"); 


IF ( (isset($_POST['name'])AND (isset($_POST['title']) 
 AND (isset($_POST['roll']) AND (isset($_POST['ppost']) ))))): 
  
    $name    = stripslashes($_POST['name']); 
    $post = stripslashes($_POST['ppost']); 
    $roll    = stripslashes($_POST['roll']); 
    $title = stripslashes($_POST['title']); 

  // Adds the new entry to the database 
  $sql = "INSERT INTO pforum (pf_name,pf_title,pf_username,pf_ppost) VALUES ('$name','$title','$roll','$post')";

  $qry = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 

  // Acknowledge entry 
  print "<p><label for='name'>Thank you $name. Your post has been forwarded.</p><br>"; 
ENDIF; 


?>

<br>
<br>
<br>

<a href="admin_home.php">Back to Admin Home</a>
<br>