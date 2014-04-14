<!--Must use table name 'alumni' for alumni user data and 'admin' for admin user data. -->


<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "alumni_website";
$table="alumni";
$table_vis='vis_requests';
$table_cal='calendar_events';
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $con) or die("Could not select database");
?>