

<?php
//require('connection.php');

require_once('connection.php');
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
