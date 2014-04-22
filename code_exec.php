<?php
session_start();
require('connection.php');
$username=$_POST['username'];
$password=hash('sha256',$_POST['password']);
mysqli_query($con, "INSERT INTO $table(username, password)VALUES('$username', '$password')");
header("location: register.php?remarks=success");
mysqli_close($con);
?>