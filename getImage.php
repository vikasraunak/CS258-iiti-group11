<?php
require('connection.php');

/*
if(mysqli_ping()){
	echo "<script type='text/javascript'>alert('Yes')</script>";
}else {
	echo "<script type='text/javascript'>alert('No')</script>";
}*/
$query = 'SELECT mem_id,type,img,imgbool FROM '.$table.' WHERE mem_id="' . $_GET['id'] . '"';
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
header('Content-Type: ' . $row['type']);
echo $row['img'];
mysqli_close($con);
?>
