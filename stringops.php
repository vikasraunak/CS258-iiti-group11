<?php

require_once('connection.php');	

function clean($str)
{

	global $con;
	$str = @trim($str);
		
	if( get_magic_quotes_gpc() )
	{
			//if magic quotes is running, remove slashes it added
		$str = stripslashes($str);
	}

	return mysqli_real_escape_string($con, $str);
}

function mysqli_result($result, $i, $field) 
{ 
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_assoc($result);
    return $row[$field]; 
} 


function getVisibility($b)
{
	global $table, $con;
	$qry 	  = "SELECT * FROM $table WHERE username='$b'";
    $result	  = mysqli_query($con,$qry);
    $member   = mysqli_fetch_assoc($result);
    $visibility    = $member['visibility'];

    return trim($visibility);
}

function fromSameBatch($a, $b)
{
	//returns 1 if a and b are from same batch
	//0 otherwise
	global $table, $con;
	$qry 	  = "SELECT batch FROM $table WHERE username='$a' or username='$b'";
    $result	  = mysqli_query($con,$qry);
    $member   = mysqli_fetch_assoc($result);
    if(mysqli_result($result, 0, 'batch')==mysqli_result($result, 1, 'batch'))
    	return 1;
    else 
    	return 0;
}

function requestStatus($a, $b)
{
	//returns 1 if $a has already sent request to $b
	//returns 0 otherwise
	global $table, $table_vis, $con;
	$qry 	  = "SELECT * FROM $table_vis WHERE sent_by='$a' AND sent_to='$b'";
    $result=mysqli_query($con,$qry);
	$num=mysqli_num_rows($result);

    return $num;


}

function sendRequest($a, $b)
{
	//send visibility request from $a to $b
	global $table, $table_vis, $con;

	if(requestStatus($a, $b)!=1 && canView($a, $b)!=1)
	{
    	$qry="INSERT INTO $table_vis(sent_by,sent_to) VALUES ('$a','$b')";
		mysqli_query($con,$qry);
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
	global $table, $con;

	$v=getVisibility($b);
	$v=$v." ".$a;

	$qry="UPDATE $table 
	SET visibility='$v'
	WHERE username='$b'";
	mysqli_query($con,$qry);

	removeRequest($a, $b);
}

function removeRequest($a, $b)
{
	//removes request sent by a to b from vis_requests table
	global $table_vis, $con;

	$qry="DELETE FROM $table_vis WHERE sent_by='$a' AND sent_to='$b'";
	mysqli_query($con,$qry);
}

function removeVisible($a, $b)
{
	//disallow a to view b
	global $table, $con;

	$v=getVisibility($b);
	$pos=strpos($v, $a);
	$v=substr_replace($v, '', $pos, strlen($a)+1);
	$qry="UPDATE $table 
	SET visibility='$v'
	WHERE username='$b'";
	mysqli_query($con,$qry);
}

?>