<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('admin_connection.php');
	//Array to store validation errors
	$errmsg_arr = array();
 	
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	require_once('stringops.php');
 
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = hash('sha256', clean($_POST['password']));

	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == hash('sha256', '')) {
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
	$qry="SELECT * FROM $table_admin WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con, $qry);
 
	//Check whether the query was successful or not
	if($result) 
	{
		if(mysqli_num_rows($result) > 0) 
		{
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USERNAME_ADMIN'] = $member['username'];
			$_SESSION['SESS_PASSWORD_ADMIN'] = $member['password'];
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
