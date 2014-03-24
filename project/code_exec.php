<?php
session_start();
include('connection.php');
$table='alumni';
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("INSERT INTO $table(username, password)VALUES('$username', '$password')");
header("location: register.php?remarks=success");
mysql_close($con);
?>