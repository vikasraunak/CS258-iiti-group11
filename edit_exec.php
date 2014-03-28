<?php
	session_start();
	require_once('connection.php');
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
	$username = clean($_SESSION['SESS_USERNAME']);
	$password = clean($_SESSION['SESS_PASSWORD']);
 	$name 	=clean($_POST['name']);
 	$batch 	=clean($_POST['batch']);
 	$branch	=clean($_POST['branch']);
 	$email 	=clean($_POST['email']);
 	$phone 	=clean($_POST['phone']);
 	$curr_loc =clean($_POST['curr_loc']);
 	$perm_loc 	=clean($_POST['perm_loc']);
 	$job 	=clean($_POST['job']);
 	$active = 1;
 	$_SESSION['SESS_ACTIVE']=1;
	//Input Validations
	if($name == '') {
		$errmsg_arr[] = 'Name cannot be left blank';
		$errflag = true;
	}
	if($batch == '') {
		$errmsg_arr[] = 'Batch cannot be left blank';
		$errflag = true;
	}
	if($branch == '') {
		$errmsg_arr[] = 'Branch cannot be left blank';
		$errflag = true;
	}
	if($email == '') {
		$errmsg_arr[] = 'Email cannot be left blank';
		$errflag = true;
	}
	if($phone == '') {
		$errmsg_arr[] = 'Phone cannot be left blank';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['EDIT_ERRORS'] = $errmsg_arr;
		session_write_close();
		header("location: editprofile.php?remarks=fail");
		exit();
	}
 
	//Create query
	$qry="UPDATE $table 
	SET name='$name', phone='$phone', email='$email', branch='$branch', batch='$batch', curr_loc='$curr_loc', perm_loc='$perm_loc', active='$active', job='$job'
	WHERE username='$username' AND password='$password'";
	mysql_query($qry);
	
	

$nameofpic=$_FILES['userFile']['name'];

if(isset($nameofpic)){
if(!empty($nameofpic)){
		if ( !isset($_FILES['userFile']['type'])  ) {
}else if ( !preg_match( '/gif|png|x-png|jpeg/', $_FILES['userFile']['type']) ) {
   die('<p>Only browser compatible images allowed</p></body></html>');
// Copy image file into a variable
} else if ( $_FILES['userFile']['size'] > 1048576 ) {
   die('<p>Sorry file too large</p></body></html>');
// Connect to database
} else if ( !($handle = fopen ($_FILES['userFile']['tmp_name'], "r")) ) {
   die('<p>Error opening temp file</p></body></html>');
} else if ( !($image = fread ($handle, filesize($_FILES['userFile']['tmp_name']))) ) {
   die('<p>Error reading temp file</p></body></html>');
} else {
   fclose ($handle);
   // Commit image to the database
   $image = mysql_real_escape_string($image);
   $imagebool=1;
   $filetype=$_FILES['userFile']['type'];
   $query="UPDATE $table 
	SET type='$filetype', img='$image', imgbool='$imagebool'
	WHERE username='$username' AND password='$password'";

   if ( !(mysql_query($query,$con)) ) {
      die('<p>Error writing image to database</p></body></html>');
   } else {
   }
}
	}
}

	
	mysql_close($con);
	header("location: editprofile.php?remarks=success");
 
	//Added security, verifies username and pass once again before updating
	
?>
