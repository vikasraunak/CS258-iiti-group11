<?php
	session_start();
	require('connection.php');
	require_once('stringops.php');
	//Array to store validation errors
	$errmsg_arr = array();
	//Validation error flag
	$errflag = false;
	//Function to sanitize values received from the form. Prevents SQL injection
 
	//Sanitize the POST values
	$username 	= clean($_SESSION['SESS_USERNAME']);
	$password 	= clean($_SESSION['SESS_PASSWORD']);
 	$oldpass 	= hash('sha256',clean($_POST['oldpass']));
 	$newpass 	= hash('sha256',clean($_POST['newpass']));
 	$newpass2	= hash('sha256',clean($_POST['newpass2']));
 	$blank		= hash('sha256','');

	//Input Validations
	if($oldpass == $blank) {
		$errmsg_arr[] = 'Old password cannot be left blank';
		$errflag = true;
	}
	if($newpass == $blank) {
		$errmsg_arr[] = 'New Password cannot be left blank';
		$errflag = true;
	}
	if($newpass2 == $blank) {
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
	mysqli_query($con, $qry);
	mysqli_close($con);
	$_SESSION['SESS_PASSWORD']=$newpass;
	session_write_close();
	header("location: changepassword.php?remarks=success");
 
	//Added security, verifies username and pass once again before updating
	
?>