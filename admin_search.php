<?php
	require('admin_auth.php');
	require_once('stringops.php');
	$param_batch="";
	$param_roll="";
	$param_name="";
	$num_param=count($_GET);
	
	if ($num_param>0)
	{
		$param_batch=clean($_GET['param_batch']);
		$param_roll=clean($_GET['param_roll']);
		$param_name=clean($_GET['param_name']);
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

	<div class="col-md-8 col-md-offset-2 well"><h4><a href="admin_home.php"><span class='glyphicon glyphicon-home'></span> Back to Admin Home</a></h4></div>
	
  	<form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="GET" class="form-inline">
  		<div class="row">
  		<div class="container col-md-8 col-md-offset-2 well" align="left">
  			<div class="col-md-3"><input type="text" class="form-control" name="param_name" placeholder="Name" value="<?php echo $param_name ?>"/></div>
    		<div class="col-md-3"><input type="text" class="form-control" name="param_batch" placeholder="Batch" value="<?php  echo $param_batch ?>"/></div>
      		<div class="col-md-3"><input type="text" class="form-control" name="param_roll" placeholder="Roll Num" value="<?php  echo $param_roll ?>"/></div>
      		<div class="col-md-2" align="center"><input name="submit" class="btn btn-primary" type="submit" value="Search"></div>
      		</form>
      		<div class="col-md-1" align="left"><button type="button" class="btn btn-primary" onclick="clear1()">Clear</button></div>
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
		}elseif($param_roll=="" and $param_batch=="" and $param_name!="")
		{
			$qry="SELECT * FROM $table WHERE `name` LIKE '%".$param_name."%' ";
			$flag=true;
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
				?>
      <tr>
        <td><span class="c1"><?php  echo $i+1; ?></span></td>
        <td><span class="c1"><a href="<?php  echo 'admin_profile.php?param='.$roll; ?>"><?php  echo $name; ?></a></span></td>
        <td><span class="c1"><?php  echo $roll; ?></span></td>
        <td><span class="c1"><?php  echo $batch; ?></span></td>
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
