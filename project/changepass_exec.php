<?php
	session_start();
	require_once('connection.php');
 	$table='alumni';
	//Array to store validation errors
	$errmsg_arr = array();
	//Validation error flag
	$errflag = false;
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) 
	{
		$str = @trim($str);
		if( get_magic_quotes_gpc() ) 
		{
			//if magic quotes is running, remove slashes it added
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$username 	= clean($_SESSION['SESS_USERNAME']);
	$password 	= clean($_SESSION['SESS_PASSWORD']);
 	$oldpass 	= clean($_POST['oldpass']);
 	$newpass 	= clean($_POST['newpass']);
 	$newpass2	= clean($_POST['newpass2']);

	//Input Validations
	if($oldpass == '') {
		$errmsg_arr[] = 'Old password cannot be left blank';
		$errflag = true;
	}
	if($newpass == '') {
		$errmsg_arr[] = 'New Password cannot be left blank';
		$errflag = true;
	}
	if($newpass2 == '') {
		$errmsg_arr[] = 'Re-enter new password cannot be left blank';
		$errflag = true;
	}
	if($oldpass!=$password) {
		$errmsg_arr[] = 'Old Password is incorrect';
		$errflag = true;
	}
	if($newpass2!=$newpass) {
		$errmsg_arr[] = 'Re-entered password does not match';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['CP_ERRORS'] = $errmsg_arr;
		session_write_close();
		header("location: changepassword.php?remarks=fail");
		exit();
	}
 
	//Create query
	$qry="UPDATE $table 
	SET password='$newpass'
	WHERE username='$username' AND password='$password'";
	mysql_query($qry);
	mysql_close($con);
	$_SESSION['SESS_PASSWORD']=$newpass;
	session_write_close();
	header("location: changepassword.php?remarks=success");
 
	//Added security, verifies username and pass once again before updating
	
?>