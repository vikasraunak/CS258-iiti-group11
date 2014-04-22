<?php

require('auth.php');
require_once('connection.php');
require_once('stringops.php');

//status:: 0= pending 1=rejected, delete entry and add to user vis string: on accept

$username=$_SESSION['SESS_USERNAME'];
$qry="SELECT vis_requests.sent_by, alumni.name FROM $table_vis INNER JOIN $table ON vis_requests.sent_by=alumni.username WHERE sent_to='$username' AND status=0";
$result=mysqli_query($con,$qry);
			$num=mysqli_num_rows($result);
?>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  	<!--LINK CSS FILES-->
  	<link rel="stylesheet" type="text/css" href="css/general.css"> 
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  	<title>Profile Visibility</title>

</head>

<body>
<?php require_once('navbar.php');?>   

<div class="container">
<div class="col-md-6 col-md-offset-3">

<!--PENDING REQUESTS-->
<div class="row">
<div class="panel panel-default">
<div class="panel-heading" align="center">
	<h3>Pending Visibility Requests</h3>
</div>
<table class="table table-striped">
<?php
			if ($num==0) 
			{
				echo '<div align="center" class="alert alert-warning"><span class="glyphicon glyphicon-transfer"></span> No pending requests</div>';
			}

			$i=0;
			while ($i < $num)
			{
				$sent_by=mysqli_result($result,$i,"sent_by");
				$name=mysqli_result($result,$i,"name");
				?>
      
      <tr>
      	<td>
        <a href="<?php  echo 'profile.php?param='.$sent_by; ?>"><?php  echo '<b>'.$name.'</b> ('.$sent_by.')'; ?></a>
        </td>
        <td align="right">
        <a href="deal_with_request.php?f=0&sent_by=<?php echo $sent_by;?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span> Allow</button></a>
        <a href="deal_with_request.php?f=1&sent_by=<?php echo $sent_by;?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Refuse</button></a>
        </td>
      </tr>
      
      	<?php
				$i++;
			}
		?>
	</table
	</div>
	</div>


<!-- MANAGE CURRENT FRIENDS -->

	<div class="row">
	<div class="panel panel-default">

	<div class="panel-heading" align="center">
	<h3>People who can view your profile</h3>
	</div>

		<table class="table table-striped">
		<?php
			$friends = explode(" ", getVisibility($_SESSION['SESS_USERNAME']));
			$num 	 = count($friends);
 
			if ($num==0 || $friends[0]=='' ||$friends[0]==' ') 
			{
				echo '<div align="center" class="alert alert-warning"><span class="glyphicon glyphicon-ban-circle"></span> None</div>';
			}
			else{
			$i=0;
			while ($i < $num)
			{
				$qry = "SELECT * FROM $table WHERE username='$friends[$i]'";
				$result=mysqli_query($con,$qry);
				$name=mysqli_result($result,0,"name");
				?>
      
      <tr>
      	<td>
        <a href="<?php  echo 'profile.php?param='.$friends[$i]; ?>"><?php  echo '<b>'.$name.'</b> ('.$friends[$i].')'; ?></a>
        </td>
        <td align="right">
        <a href="deal_with_request.php?f=2&sent_by=<?php echo $friends[$i];?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Disallow</button></a>
        </td>
      </tr>
      
      	<?php
				$i++;
			}}
		?>
	</table
	</div>
	</div>


</div>	
</div>
<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>