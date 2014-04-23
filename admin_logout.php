<html>
<body>
<?php
	//Unset the variables stored in session
	session_start();

	unset($_SESSION['SESS_USERNAME_ADMIN']);
	unset($_SESSION['SESS_PASSWORD_ADMIN']);

	header('location:admin_index.php');

	exit();
?>

<li><a href="admin_index.php" title="Return To Website">Admin 
Login page</a></li>
</html>
</body>
