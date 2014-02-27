<?php
	require_once('auth.php');
	$param_batch="";
	$param_roll="";
	$num_param=count($_GET);
	
	if ($num_param>0)
	{
		$param_batch=clean($_GET['param_batch']);
		$param_roll=clean($_GET['param_roll']);
	}

	?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/general.css">
  <title>Search Alumni Database</title>
  <div align="center" class="largetext">Alumni Database</div>
  <style type="text/css">
/*<![CDATA[*/
  span.c1 {
  				font-family: Trebuchet MS, Helvetica, sans-serif;
  				font-size: "16";
  			}
  /*]]>*/
  </style>
</head>
<body>
	<table width="200" align="center" cellpadding="10">
    <tr>
      <td align="center"><a href="home.php">Home</a></td>
      <td align="center"><a href="logout.php">Logout</a></td>
    </tr>
  </table><br>
  <form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="GET">
  <table align="center" width="300" cellpadding="5">
  		<tr>
        <td width="95">
          <div align="right">
            Batch:
          </div>
        </td>
        <td width="171"><input type="text" name="param_batch" value="<?php  echo $param_batch ?>"></td>
      </tr>
      <tr>
        <td width="95">
          <div align="right">
            Roll No:
          </div>
        </td>
        <td width="171"><input type="text" name="param_roll" value="<?php  echo $param_roll ?>"></td>
      </tr>
      <tr>
      	<td colspan="2">
      		<div align="center">
        		<input name="submit" type="submit" value="Submit">
      		</div>
      	</td>
      </tr>
  </table>
  </form>
      <table width="600" border="0" cellspacing="2" cellpadding="2" align="center">
      <tr>
        <td><span class="c1">Index No.</span></td>
        <td><span class="c1">Name</span></td>
        <td><span class="c1">Roll Number</span></td>
        <td><span class="c1">Batch</span></td>
      </tr>
    <?php
	
	function clean($str)
	{
		$str = @trim($str);
		
		if( get_magic_quotes_gpc() )
		{
			//if magic quotes is running, remove slashes it added
			$str = stripslashes($str);
		}

		return mysql_real_escape_string($str);
	}

	$flag=false;
	
	if($num_param>0)
	{
		include('connection.php');
		
		if($param_roll=="" and $param_batch!="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch'";
			$flag=true;
		}

		elseif($param_batch=="" and $param_roll!="")
		{
			$qry="SELECT * FROM $table WHERE username='$param_roll'";
			$flag=true;
		}

		elseif($param_roll!="" and $param_batch!="")
		{
			$qry="SELECT * FROM $table WHERE batch='$param_batch' AND username='$param_roll'";
			$flag=true;
		}

		
		if($flag)
		{
			$result=mysql_query($qry);
			$num=mysql_numrows($result);
			mysql_close();
			$i=0;
			while ($i < $num)
			{
				$active=mysql_result($result, $i, "active");
				$name=mysql_result($result,$i,"name");
				$roll=mysql_result($result,$i,"username");
				$batch=mysql_result($result,$i,"batch");
				?>
      <tr>
        <td><span class="c1"><?php  echo $i+1; ?></span></td>
        <td><span class="c1"><?php  echo $name; ?></span></td>
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
</body>
</html>