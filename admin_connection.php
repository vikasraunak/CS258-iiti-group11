<?php
require 'admin_con_config.php' ;
$conn=mysql_connect($database_host,$username,$password) 
or die("<p>Error Connecting to database:". mysql_error()."</p>") ;
mysql_select_db($database_name)
or die("<p> Error selecting the database:". mysql_error(). "</p>");

?>