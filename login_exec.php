<?php
	//Start session
	session_start();
 
	//Include database connection details
	require('connection.php');
	require_once('stringops.php');
	//Array to store validation errors
	$errmsg_arr = array();
 	
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
 
	//Sanitize the POST values
	if(count($_POST)==2)
	{
	$username = clean($_POST['username']);
	$password = hash('sha256', clean($_POST['password']));
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == hash('sha256','')) {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: alumni_login.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM $table WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con, $qry);
 
	//Check whether the query was successful or not
	if($result) 
	{
		if(mysqli_num_rows($result) > 0) 
		{
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USERNAME'] = $member['username'];
			$_SESSION['SESS_PASSWORD'] = $member['password'];
			$_SESSION['SESS_ACTIVE']   = $member['active'];
			session_write_close();
			header("location: home.php");
			exit();
		}
		else 
		{
			//Login failed
			$errmsg_arr[] = 'Username and Password do not match';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: alumni_login.php");
				exit();
			}
		}
	}
	else 
	{
		die("Query failed");
	}
}
?>