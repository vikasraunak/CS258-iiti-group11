<?php
ob_start();
$mysql_hostname = "localhost";


$mysql_user = "root";
$mysql_password = "";
$mysql_database = "alumni_website";



$table="alumni";
$table_vis='vis_requests';
$table_cal='calendar_events';
$table_admin='admin';


$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");
?>