<?php

require_once('connection.php');	


function getVisibility($b)
{
	global $table;
	$qry 	  = "SELECT * FROM $table WHERE username='$b'";
    $result	  = mysql_query($qry);
    $member   = mysql_fetch_assoc($result);
    $visibility    = $member['visibility'];

    return trim($visibility);
}

function fromSameBatch($a, $b)
{
	//returns 1 if a and b are from same batch
	//0 otherwise
	global $table;
	$qry 	  = "SELECT batch FROM $table WHERE username='$a' or username='$b'";
    $result	  = mysql_query($qry);
    $member   = mysql_fetch_assoc($result);
    if(mysql_result($result, 0, 'batch')==mysql_result($result, 1, 'batch'))
    	return 1;
    else 
    	return 0;
}

function requestStatus($a, $b)
{
	//returns 1 if $a has already sent request to $b
	//returns 0 otherwise
	global $table, $table_vis;
	$qry 	  = "SELECT * FROM $table_vis WHERE sent_by='$a' AND sent_to='$b'";
    $result=mysql_query($qry);
	$num=mysql_numrows($result);

    return $num;


}

function sendRequest($a, $b)
{
	//send visibility request from $a to $b
	global $table, $table_vis;

	if(requestStatus($a, $b)!=1 && canView($a, $b)!=1)
	{
    	$qry="INSERT INTO $table_vis(sent_by,sent_to) VALUES ('$a','$b')";
		mysql_query($qry);
    }

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

	removeRequest($a, $b);
}

function removeRequest($a, $b)
{
	//removes request sent by a to b from vis_requests table
	global $table_vis;

	$qry="DELETE FROM $table_vis WHERE sent_by='$a' AND sent_to='$b'";
	mysql_query($qry);
}

function removeVisible($a, $b)
{
	//disallow a to view b
	global $table;

	$v=getVisibility($b);
	$pos=strpos($v, $a);
	$v=substr_replace($v, '', $pos, strlen($a)+1);
	$qry="UPDATE $table 
	SET visibility='$v'
	WHERE username='$b'";
	mysql_query($qry);
}

?>