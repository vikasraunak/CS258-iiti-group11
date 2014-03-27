<?php
        require_once('auth.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reaquest sent to institute</title>
<link href="_css/site.css" rel="stylesheet">
<script src="_js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function() {

}); // end ready
</script>
</head>
<body>

<?php

require('fetchprofile.php');

 if($_POST['reason'] =='acc'){
 	$reason='REQUEST FOR ACCOMODATION';
 }else if($_POST['reason']=='doc'){
 	$reason='REQUEST FOR DOCUMENTS';
 }else{
 	$reason=NULL;
 	echo $reason;
 }

$to=$_POST['emailto'];
$from=$_POST['email'];
$sub=$_POST['sub'];
$msg=$_POST['msg'];
$msg=$reason."\n".$msg."\n\n"."From:\nname: ".$name."\nbatch: ".$batch."\nroll no.: ".$username;
echo "\n$msg";
$msg=wordwrap($msg,70);

mail($to,$sub,$msg,"From: $from\n");

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
			<p>Yay ! You've successfully mailed the request. </br>
                                                            Admin will verify your request and </br>
                                                            You will receive an e-mail shortly on your primary mail.
                                                     </p>
			
		</div>
	</div>

	<div class="footer">
		<p>Return to <a href="http://www.iiti.ac.in"> IITI Website</a> Or <a href="index.php">IITI Alumni Network</a>.</p>
	</div>
</div>
</body>
</html>
