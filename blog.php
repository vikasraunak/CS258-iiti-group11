<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Blog</title>
</head>

<body>
<div class="container">
  <div class="col-md-4 col-md-offset-4">
  <div class="alert alert-success">
  <p>You may submit a post to the blog by logging in.</p>
  </div>
  </div>
</div>
<div class="container">

<div class="col-md-10 col-md-offset-1">
<?php 

include "admin_connection.php"; 
include "navbar_main.php";


$sql  = " SELECT `pf_id`, `pf_name`,`pf_title`,`pf_ppost`, `pf_username`, DATE_FORMAT(`pf_date`, '%M %D, %Y at %H:%i') as `pf_date` FROM `pforum` "; 
$sql .= " WHERE `pf_status`=1 ORDER BY `pf_id` "; 
$qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 


while($row = mysqli_fetch_array($qry)){
  print '<div class="well">';
  print "<h2>" . $row['pf_title'] . "</h2>"; 
  print "<h4>Submitted by " . $row['pf_name'] . " on " . $row['pf_date']."</h4>"; 
  print "<p>&nbsp;&nbsp;Post : " . $row['pf_ppost']."</p>"; 
  print '</div>';
}
?>
</div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>