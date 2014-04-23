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


if( (isset($_POST['branch'])    AND (trim($_POST['branch']) != "")) AND
 (isset($_POST['mail']) AND trim($_POST['mail']) != "")  AND (isset($_POST['roll']) AND trim($_POST['roll']) !="")) {

    $mail = stripslashes($_POST['mail']); 
    $roll    = stripslashes($_POST['roll']); 
    $branch=stripslashes($_POST['branch']);

    $mail=mysqli_real_escape_string($mail);
    $roll=mysqli_real_escape_string($roll);
    $branch=mysqli_real_escape_string($branch);

  $sql  = " INSERT INTO `p_reset` "; 
  $sql .= " SET    `pr_mail`= '$mail' ,"; 
  $sql .= "     `pr_roll` = '$roll', "; 
  $sql .= "     `pr_branch`  = '$branch' ";
  
  $resultt=mysql_query($sql) or die('could not update query');
  if($resultt!=1){
    echo 'failure';
    die('could not upload into database');
  }


$nameofpic=$_FILES['userFile']['name'];

if(isset($nameofpic)){
if(!empty($nameofpic)){
    if ( !isset($_FILES['userFile']['type'])  ) {
}else if ( !preg_match( '/gif|png|x-png|jpeg/', $_FILES['userFile']['type']) ) {
   die('<p>Only browser compatible images allowed</p></body></html>');
// Copy image file into a variable
} else if ( $_FILES['userFile']['size'] > 1048576 ) {
   die('<p>Sorry file too large</p></body></html>');
// Connect to database
} else if ( !($handle = fopen ($_FILES['userFile']['tmp_name'], "r")) ) {
   die('<p>Error opening temp file</p></body></html>');
} else if ( !($image = fread ($handle, filesize($_FILES['userFile']['tmp_name']))) ) {
   die('<p>Error reading temp file</p></body></html>');
} else {
   fclose ($handle);
   // Commit image to the database
   $image = mysql_real_escape_string($image);
   $imagebool=1;
   $filetype=$_FILES['userFile']['type'];
   $query="UPDATE `p_reset` 
  SET `pr_type`='$filetype', `pr_img`='$image', pr_imgbool='$imagebool'
  WHERE `pr_mail`='$mail'";

   if ( !(mysql_query($query,$con)) ) {
      die('<p>Error writing image to database</p></body></html>');
   } else {
   }
}
  }
}


}
else{
  die("<br><br><h2><p>Enter all the fields correctly</p></h2>");
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

	<div class="footer1">
		<p>Return to <a href="http://www.iiti.ac.in"> IITI Website</a> Or <a href="http://www.iiti.ac.in">IITI Alumni Network</a>.</p>
	</div>
</div>
</body>
</html>
