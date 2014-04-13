<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('admin_connection.php');
 	$table='admin';
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
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: admin_index.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM $table WHERE username='$username' AND password='$password'";
	$result=mysql_query($qry);
 
	//Check whether the query was successful or not
	if($result) 
	{
		if(mysql_num_rows($result) > 0) 
		{
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_USERNAME_ADMIN'] = $member['username'];
			$_SESSION['SESS_PASSWORD_ADMIN'] = $member['password'];
			$_SESSION['SESS_ACTIVE']   = $member['active'];
			session_write_close();
			header("location: admin_home.php");
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
				header("location: admin_index.php");
				exit();
			}
		}
	}
	else 
	{
		die("Query failed");
	}
?>
