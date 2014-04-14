<?php
	//Start session
	session_start();
	if(!isset($_SESSION['SESS_USERNAME']) || (trim($_SESSION['SESS_USERNAME']) == '')) 
	{
		//check if logged in or not
		header("location: alumni_login.php");
		exit();
	}
	else
	{
		if($_SESSION['SESS_ACTIVE']==0)
		{
			//this requires users that have logged in for the first time to update their profile
			header("location: editprofile.php?remarks=inactive");
			exit();
		}
	}
?> 