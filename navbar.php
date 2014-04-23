<?php

$filepath=$_SERVER['PHP_SELF'];

echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
  echo'<ul class="nav navbar-nav">  ';
    echo'<li><a href="index.php" class="navbar-brand"><img width="25px" height="25px" src="logo.png"></a></li>';
    
    if ($filepath=='/home.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>';
    else
		echo '<li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>';


	if ($filepath=='/profile.php'||$filepath=='/editprofile.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';
    else
		echo '<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';

    if ($filepath=='/profile_visibility.php') 
        echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Profile Visibility</a></li>';
    else
        echo '<li><a href="profile_visibility.php"><span class="glyphicon glyphicon-eye-open"></span> Profile Visibility</a></li>';

	if ($filepath=='/search.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-search"></span> Search Database</a></li>';
    else
		echo '<li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search Database</a></li>';

    if ($filepath=='/events.php'||$filepath=='/event.php') 
        echo '<li class="active"><a href="events.php"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>';
    else
        echo '<li><a href="events.php"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>';

    if ($filepath=='/blog_submit.php') 
        echo '<li class="active"><a href="blog_submit.php"><span class="glyphicon glyphicon-pencil"></span> Write Post Blog</a></li>';
    else
        echo '<li><a href="blog_submit.php"><span class="glyphicon glyphicon-pencil"></span> Write Blog Post</a></li>';


	if ($filepath=='/changepassword.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>';
    else
		echo '<li><a href="changepassword.php"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>';


	if ($filepath=='/logout.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>';
    else
		echo '<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>';

  echo '</ul>';
echo '</nav>';
	
?>