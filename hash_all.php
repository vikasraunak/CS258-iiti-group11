<?php

//use $table to update alumni table 
//use $table_admin to update admin table

// NOTE: Length of password varchar field in SQL DB must be at least 64 to accommodate sha256 hash

require('connection.php');

	$qry="SELECT username, password FROM $table_admin";
	$result=mysqli_query($con, $qry);
	$num=mysqli_numrows($result);

	for ($i=0; $i<$num; $i++)
  	{
  		$member = mysqli_fetch_assoc($result);
  		$old=mysqli_result($result, $i, "password");
  		$username=mysqli_result($result, $i, "username");
  		$password=hash('sha256', $old);
  		echo 'Old: '.$old.' New: '.$password.'<br>';
  		mysqli_query($con, "UPDATE $table_admin SET password='$password' WHERE username='$username'");
 	} 

?>