//used for <img src="...."> , url for image

<?php
//require('connection.php');

$mysql_hostname = "localhost";
$mysql_user = "";       //provide your username here
$mysql_password = "";   //provide your password here
$mysql_database = "";   //provide your database here..
$table="alumni";
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $con) or die("Could not select database");
/*
if(mysql_ping()){
	echo "<script type='text/javascript'>alert('Yes')</script>";
}else {
	echo "<script type='text/javascript'>alert('No')</script>";
}*/
$query = 'SELECT mem_id,type,img,imgbool FROM alumni WHERE mem_id="' . $_GET['id'] . '"';
$result = mysql_query($query,$con);
$row = mysql_fetch_assoc($result);
header('Content-Type: ' . $row['type']);
echo $row['img'];
mysql_close($con);
?>
