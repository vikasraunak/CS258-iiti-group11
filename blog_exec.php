<?php
        require('auth.php');
?>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Profile</title>
</head>

<body>
<div class="container">
<div class="col-md-6 col-md-offset-3">

  <?php
    require_once('navbar.php');
require('fetchprofile.php');
require("admin_connection.php"); 
$roll=$_SESSION['SESS_USERNAME'];
fetchProfile($roll,1);

if(isset($_POST['title']) && isset($_POST['ppost']) )
{
    $post = stripslashes($_POST['ppost']); 
    $title = stripslashes($_POST['title']); 

  // Adds the new entry to the database 
  $sql = "INSERT INTO pforum (pf_name,pf_title,pf_username,pf_ppost) VALUES ('$name','$title','$roll','$post')";

  $qry = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 

  // Acknowledge entry 
  echo '<div class="alert alert-success">';
  echo '<span class="glyphicon glyphicon-ok"></span> Blog post submitted to admin for approval.<br>The post would appear as a part of the <a href="blog.php">Blog</a> once the admin approves it.'; 
  echo '</div>';
} 
else
	echo 'error';


?>
<div class="well"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Back to Alumni Home</a></div>
</div>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>