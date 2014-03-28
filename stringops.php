<?php

require_once('connection.php');	
$table='alumni';

function getVisibility($b)
{
	global $table;
	$qry 	  = "SELECT * FROM $table WHERE username='$b'";
    $result	  = mysql_query($qry);
    $member   = mysql_fetch_assoc($result);
    $visibility    = $member['visibility'];

    return $visibility;
}

function canView($a,$b)
{
	//returns 1 if a can see b's profile
	//0 otherwise

	$v=getVisibility($b);

	if (strpos($v, $a) !== FALSE)
    	return 1;
	else
    	return 0;

}

function addVisible($a, $b)
{
	//Allow a to view b
	global $table;

	$v=getVisibility($b);
	$v=$v." ".$a;

	$qry="UPDATE $table 
	SET visibility='$v'
	WHERE username='$b'";
	mysql_query($qry);
}

function removeVisible($a, $b)
{
	//disallow a to view b
	global $table;

	$v=getVisibility($b);
	$pos=strpos($v, $b);
	$v1=substr($v, 0, $pos-1);
	$v2=substr($v, $pos+count($a));
	$v=$v1.$v2;


	$qry="UPDATE $table 
	SET visibility='$v'
	WHERE username='$b'";
	mysql_query($qry);
}

?>