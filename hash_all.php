<?php

//use $table to update alumni table 
//use $table_admin to update admin table

// NOTE: Length of password varchar field in SQL DB must be at least 64 to accommodate sha256 hash

require('connection.php');

	$qry="SELECT username, password FROM $table_admin";
	$result=mysql_query($qry);
	$num=mysql_numrows($result);

	for ($i=0; $i<$num; $i++)
  	{
  		$member = mysql_fetch_assoc($result);
  		$old=mysql_result($result, $i, "password");
  		$username=mysql_result($result, $i, "username");
  		$password=hash('sha256', $old);
  		echo 'Old: '.$old.' New: '.$password.'<br>';
  		mysql_query("UPDATE $table_admin SET password='$password' WHERE username='$username'");
 	} 

?>