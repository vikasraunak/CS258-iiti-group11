<?php
//require('connection.php');

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "toor";
$mysql_database = "alumni_website";
$table="alumni";
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $con) or die("Could not select database");
/*
if(mysql_ping()){
	echo "<script type='text/javascript'>alert('Yes')</script>";
}else {
	echo "<script type='text/javascript'>alert('No')</script>";
}*/
$query = 'SELECT `pr_id`,`pr_type`,`pr_img`,`pr_imgbool` FROM `p_reset` WHERE `pr_id`="' . $_GET['id'] . '"';
$result = mysql_query($query,$con);
$row = mysql_fetch_assoc($result);
header('Content-Type: ' . $row['pr_type']);
echo $row['pr_img'];
mysql_close($con);
?>
