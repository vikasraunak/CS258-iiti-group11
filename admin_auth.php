<?php
	//Start session
	session_start();
	if(!isset($_SESSION['SESS_USERNAME_ADMIN']) || (trim($_SESSION['SESS_USERNAME_ADMIN']) == '')) 
	{
		//check if logged in or not
		header("location: admin_index.php");
		exit();
	}
?>