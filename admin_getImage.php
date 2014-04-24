<?php
require('connection.php');

/*
if(mysql_ping()){
	echo "<script type='text/javascript'>alert('Yes')</script>";
}else {
	echo "<script type='text/javascript'>alert('No')</script>";
}*/
$query = 'SELECT `pr_id`,`pr_type`,`pr_img`,`pr_imgbool` FROM `p_reset` WHERE `pr_id`="' . $_GET['id'] . '"';
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
header('Content-Type: ' . $row['pr_type']);
echo $row['pr_img'];
mysqli_close($con);
?>
