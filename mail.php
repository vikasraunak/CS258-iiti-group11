<?php

include ('class.phpmailer.php');
include ('class.smtp.php');

$mail = new PHPMailer(true);

//Send mail using gmail
if(1){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "darshantejani007@gmail.com"; // GMAIL username
    $mail->Password = "vpceh3aengtn7000ddlsc"; // GMAIL password
}

$email='kartikeya1994@gmail.com';
$from='darshantejani007@gmail.com';
//Typical mail data
$mail->AddAddress($email, 'darshan');
$mail->SetFrom($from, 'darshan');
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail :(";
}

?>