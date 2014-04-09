<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Password Reset Form</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function() {

}); // end ready
</script>
</head>
<body>



<?php
	include "connection.php"; 

if( (isset($_POST['Name'])    AND (trim($_POST['Name']) != "")) 
 AND (isset($_POST['email']) AND trim($_POST['email']) != "") AND (isset($_POST['roll']) AND trim($_POST['roll']) !="")
 AND (isset($_POST['dob']) AND trim($_POST['dob']) != "")) {
  
    $name    = stripslashes($_POST['Name']); 
    $email = stripslashes($_POST['email']); 
    $roll    = stripslashes($_POST['roll']); 
    $dob = stripslashes($_POST['dob']); 
    $branch=stripslashes($_POST['branch']);

  $sql  = " INSERT INTO `p_reset` "; 
  $sql .= " SET `pr_name` = '$name', "; 
  $sql .= "     `pr_email`= '$email' ,"; 
  $sql .= "     `pr_roll` = '$roll', "; 
  $sql .= "     `pr_dob`  = '$dob' ";
  $sql .= "     `pr_branch`  = '$branch' ";
  
  $resultt=mysql_query($sql) or die('could not update query');
  if($resultt!=1){
    echo 'failure';
    die('could not upload into database');
  }

}
else{
  die('enter all the fields correctly');
}
?>



<div class="wrapper">
	<div class="header">
		<p class="logo">IIT<i> </i> Indore <i class="mm">IITI<br>
			Alumni<br>
			Network</i></p>
	</div>
	<div class="content">
		<div class="main">
			<h1>Form Processed</h1>
			<p>Yay ! You've successfully submitted the form. </br>
                                                            Admin will verify your request and </br>
                                                            You will receive an e-mail shortly on your primary mail.
                                                     </p>
			
		</div>
	</div>

	<div class="footer">
		<p>Return to <a href="http://www.iiti.ac.in"> IITI Website</a> Or <a href="http://www.iiti.ac.in">IITI Alumni Network</a>.</p>
	</div>
</div>
</body>
</html>
