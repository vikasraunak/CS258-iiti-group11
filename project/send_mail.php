<html>
<body>

<?php

include("con_config.php");
$subject = $_POST ['subject'];
$emails= $_POST['to'];
$message = $_POST ['message'];

$to = implode(", ", $emails);

$from = "admin@iiti.alumni.ac.in";
$headers = "From:" . $from;
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