<?php
        require_once('auth.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Request Sent</title>
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function() {

}); // end ready
</script>
</head>
<body>

<?php
require_once('navbar.php');
require('fetchprofile.php');
$nam=$_SESSION['SESS_USERNAME'];
fetchprofile($nam,0);


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
$msg=$reason."\n".$msg."\n\n"."From::\nname= ".$name."\nbatch= ".$batch."\nroll no.= ".$nam;
//echo "\n$msg";
$msg=wordwrap($msg,70);

mail($to,$sub,$msg,"From: $from\n");

?>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="alert alert-success">
			Request Submitted Sucessfully
		</div>
	</div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
