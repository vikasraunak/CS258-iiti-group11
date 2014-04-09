<html>
<body>
<link href="css/admin_css/site.css" rel="stylesheet">
<?php
include("admin_connection.php");
$subject = $_POST ['subject'];
$emails= $_POST['emails'];
$message = $_POST ['message'];
$to = implode(", ", $emails);

$from = "admin@iiti.alumni.ac.in";
$header = "From:" . $from;
$message = wordwrap($message, 70, "\r\n");

 $retval = mail ($to,$subject,$message,$header);
   if( $retval == true ) 
 {
      echo "Mail sent successfully.";
   }
   else
   {
      echo "Mail could not be sent.";
   }

?>
</body>
</html>
