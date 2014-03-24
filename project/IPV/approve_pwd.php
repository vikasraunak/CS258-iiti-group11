<?php
$check = $_REQUEST['approval'] ;


if($check) { 

 include("con_config.php");
$subject = "Password Reset Request";
$email= ////////////////////;
$new = ////////////////NOT COMPLETED ;


$message = "Your New Password is $new";
 

$from = "admin@iiti.alumni.ac.in";
$headers = "From:" . $from;
$message = wordwrap($message, 70, "\r\n");

 $retval = mail ($email,$subject,$message,$header);
   if( $retval == true ) 
 {
      echo "Mail sent successfully.";
   }
   else
   {
      echo "Mail could not be sent.";
   }

?>




