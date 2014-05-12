<?php
	require('admin_auth.php');
	require_once('stringops.php');
	$param_batch="";
	$param_roll="";
	$param_name="";
	$param_active="";
	$num_param=count($_GET);
	
	if ($num_param>0)
	{
		$param_batch=clean($_GET['param_batch']);
		$param_roll=clean($_GET['param_roll']);
		$param_name=clean($_GET['param_name']);
		$param_active=clean($_GET['param_active']);
	}

	?>

<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  	<!--LINK CSS FILES-->
  	<link rel="stylesheet" type="text/css" href="css/general.css"> 
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  	<title>Search Alumni Database</title>

  	<script type="text/javascript">
  		function clear1()
		{
			window.location.href='./search.php';
		}
  	</script>


</head>

<body>
 

<div class="container">

	<div class="col-md-8 col-md-offset-2 well" align="center">

		<h2>Search Alumni Database</h2>
		<p>Enter one or more of the following: Name, Batch(Year of passing out), Roll Number.<br>Enter 1 in Active to see alumni that have logged in and updated their profile.<br>Enter 0 in Active to see alumni that have not yet updated their profile.<br>Leave Active blank to see all alumni irrespective.</p>
		<h4><a href="admin_home.php"><span class='glyphicon glyphicon-home'></span> Back to Admin Home</a></h4>
	</div>
	<div class="row">
	<div class="col-md-10 col-md-offset-1 well" align="center">
  	<form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="GET" class="form-inline">
  		
  			<input type="text" class="form-control" name="param_name" placeholder="Name" value="<?php echo $param_name ?>"/>
    		<input type="text" class="form-control" name="param_batch" placeholder="Batch" value="<?php  echo $param_batch ?>"/>
      		<input type="text" class="form-control" name="param_roll" placeholder="Roll Num" value="<?php  echo $param_roll ?>"/>
      		<input type="text" class="form-control" name="param_active" placeholder="Active" value="<?php  echo $param_active ?>"/>
      		<input name="submit" class="btn btn-primary form-control" type="submit" value="Search">
      		<button type="button" class="btn btn-primary" onclick="clear1()">Clear</button>
      	</form>
      	</div>
      	</div>

  	<div class="row">
  	<div class="col-md-8 col-md-offset-2 panel">
  	<div class="panel-header">
  		<h3><span class="glyphicon glyphicon-search"></span> Search Results</h3>
  	</div>
  	<div class="panel-body">
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Index No.</th>
        <th>Name</th>
        <th>Roll Number</th>
        <th>Batch</th>
       	<th>Active</th> 
      </tr>
    </thead>
    <?php


	$flag=false;
	if($num_param>0)
	{
		require('connection.php');
		
		if($param_roll=="" and $param_batch!="" and $param_name=="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch'";
			$flag=true;
		}

		elseif($param_batch=="" and $param_roll!="" and $param_name=="")
		{
			$qry="SELECT * FROM $table WHERE username='$param_roll'";
			$flag=true;
		}

		elseif($param_roll!="" and $param_batch!="" and $param_name=="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch' AND username='$param_roll'";
			$flag=true;
		}elseif($param_roll=="" and $param_batch!="" and $param_name!="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch' AND `name` LIKE '%".$param_name."%' ";
			$flag=true;
		}

		elseif($param_batch=="" and $param_roll!="" and $param_name!="")
		{
			$qry="SELECT * FROM $table WHERE username='$param_roll' AND `name` LIKE '%".$param_name."%'" ;
			$flag=true;
		}

		elseif($param_roll!="" and $param_batch!="" and $param_name!="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch' AND username='$param_roll'  AND `name` LIKE '%".$param_name."%' ";
			$flag=true;
		}
		elseif($param_roll=="" and $param_batch=="" and $param_name!="")
		{
			$qry="SELECT * FROM $table WHERE `name` LIKE '%".$param_name."%' ";
			$flag=true;
		}

		if($flag && $param_active!="")
		{
			$qry.=" AND active=$param_active";
		}

		if($flag)
		{
			$result=mysqli_query($con,$qry);
			$num=mysqli_num_rows($result);

			if ($num==0) 
			{
				echo '<div class="alert alert-warning">No matches found</div>';
			}

			mysqli_close($con);
			$i=0;
			while ($i < $num)
			{
				$active=mysqli_result($result, $i, "active");
				$name=mysqli_result($result,$i,"name");
				$roll=mysqli_result($result,$i,"username");
				$batch=mysqli_result($result,$i,"batch");
				$active=mysqli_result($result,$i,"active");
				?>
      <tr>
        <td><span class="c1"><?php  echo $i+1; ?></span></td>
        <td><span class="c1"><a href="<?php  echo 'admin_profile.php?param='.$roll; ?>"><?php  echo $name; ?></a></span></td>
        <td><span class="c1"><?php  echo $roll; ?></span></td>
        <td><span class="c1"><?php  echo $batch; ?></span></td>
        <td><span class="c1"><?php  echo $active; ?></span></td>
      </tr>
      	<?php
				$i++;
			}

		}

	}

	?>
    </table>
</div>
</div>
</div>
</div>

<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>

</html>
