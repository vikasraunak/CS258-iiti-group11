<?php/*	require_once('admin_auth.php');
	require('admin_connection.php');

	$query="INSERT INTO  `admin`.`admin` (`id` ,`username` ,`password` ,`active`)VALUES (NULL ,  '$_POST['username']',  '$_POST['password']', NULL)";
	@mysql_query($query) or die("error running the query or adding the admin");

*/?>

<?php
session_start();
require_once('admin_auth.php');
include('admin_connection.php');
$username=$_POST['username'];
$password=hash('sha256', $_POST['password']);
mysql_query("INSERT INTO $table_admin(username, password)VALUES('$username', '$password')");
header("location: admin_new_admin.php?remarks=success");
mysql_close($con);
?>