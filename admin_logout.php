<html>
<body>
<?php
	//Unset the variables stored in session
	session_start();

	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_PASSWORD']);
	unset($_SESSION['SESS_ACTIVE']); 

	header('location:index.php');

	exit();
?>

<li><a href="index.php" title="Return To Website">Admin 
Login page</a></li>
</html>
</body>