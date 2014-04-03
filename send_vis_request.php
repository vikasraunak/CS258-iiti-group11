<?php

require('auth.php');
require_once('stringops.php');

if(count($_GET)==1)
{
	sendRequest($_SESSION['SESS_USERNAME'], $_GET['param']);
	header('location: profile.php?param='.$_GET['param']);
}

?>