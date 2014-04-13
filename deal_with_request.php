<?php
require('auth.php');
require_once('stringops.php');

if(count($_GET)==2 && requestStatus($_GET['sent_by'], $_SESSION['SESS_USERNAME']))
{
	if($_GET['f']==0)
	{
		addVisible($_GET['sent_by'], $_SESSION['SESS_USERNAME']);
	}

	elseif($_GET['f']==1)
	{
		removeRequest($_GET['sent_by'], $_SESSION['SESS_USERNAME']);
	}

}

if(count($_GET)==2 && $_GET['f']==2 && canView($_GET['sent_by'], $_SESSION['SESS_USERNAME'])==1)
	removeVisible($_GET['sent_by'], $_SESSION['SESS_USERNAME']);

header('location: profile_visibility.php');
?>