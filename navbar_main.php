<?php

$filepath=$_SERVER['PHP_SELF'];

echo '<div class="container">';

echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
  echo'<ul class="nav navbar-nav">  ';
    echo'<li><a href="index.php" class="navbar-brand"><img width="25px" height="25px" src="logo.png"></a></li>';
    
    if ($filepath=='/alumni_login.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Alumni Login</a></li>';
    else
		echo '<li><a href="alumni_login.php"><span class="glyphicon glyphicon-home"></span> Alumni Login</a></li>';


	if ($filepath=='/admin_index.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>';
    else
		echo '<li><a href="admin_index.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>';

    if ($filepath=='/blog.php') 
        echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-star"></span> Blog</a></li>';
    else
        echo '<li><a href="profile_visibility.php"><span class="glyphicon glyphicon-star"></span> Blog</a></li>';

	if ($filepath=='/gallery.php') 
    	echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>';
    else
		echo '<li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>';

    echo '</ul>';
echo '</nav>';
echo '</div>';
	
?>