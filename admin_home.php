<!DOCTYPE html>
<?php 
	require_once('admin_auth.php');
?>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script src="js/admin_js/site.js"></script>
<style>
.tabbedPanels {
	width: 100%;
	float: left;
	margin-right: 10px;	
}
.tabs {
	margin: 0;
	padding: 0;	
	zoom : 1;
}
.tabs li {
	float: left;
	list-style: none;
	padding: 0;
	margin: 0;
}
.tabs a {
	display: block;
	text-decoration: none;
	padding: 3px 5px;
	background-color: rgb(110,138,195);
	margin-right: 10px;
	border: 1px solid rgb(153,153,153);
	margin-bottom: -1px;
}
.tabs .active {
	border-bottom: 1px solid white;
	background-color: white;
	color: rgb(51,72,115);
	position: relative;
}

.panelContainer {
	clear: both;
	margin-bottom: 25px;	
	border: 1px solid rgb(153,153,153);	
	background-color: white;
	padding: 10px;
}

.panel h2 {
	color: rgb(57,78,121);
	text-shadow: none;		
}
.panel p {
	color: black;	
}
</style>
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function() {
	$('.tabs a').bind('click focus',function() {
		var $this = $(this);
		
		// hide panels
		$this.parents('.tabbedPanels')
		    .find('.panel').hide().end()
			.find('.active').removeClass('active');
		    
		// add active state to new tab
		$this.addClass('active').blur();	
		
		// retrieve href from link (is id of panel to display)
		var panel = $this.attr('href');
		// show panel
		$(panel).show();
		// don't follow link
		return false;
	}); // end click
	
	$('.tabs').find('li:first a').click();
}); // end ready
</script>
</head>
<body>
<div class="wrapper">
	<div class="header">
		
		<p class="logo">IIT<i></i> Indore <i class="mm">IITI<br>Alumni<br>Network</i></p>
 <div style="text-align:center">
    <div style="text-align:left; width:300px;">
       <a href="admin_logout.php">Logout</a>
    </div>
</div>
	<div class="content">
		<div class="main">
			<h1>Admin Panel</h1>
		  <div class="tabbedPanels" id="tabbed1">
			<ul class="tabs">
  <li><a href="#panel1" tabindex="1">Approve Blog Posts</a></li>
  <li><a href="#panel2" tabindex="2">Approve Accounts</a></li>
</ul>
<div class="panelContainer">
<div id="panel1" class="panel">
<p><img src="images/admin_images/small/iit.png" alt="IIT Indore" width="60" height="60" class="imgRight"></p>
<p><a href="admin_forum_form.php" style="color: rgb(0,0,0)">Write Blog Post</a></p>
<p><a href="admin_approve_forum_post.php" style="color: rgb(0,0,0)">Approve Blog Posts</a></p>
<p><a href="blog.php" style="color: rgb(0,0,0)">View Blog</a></p>
</div>
<div id="panel2" class="panel">
<p><a href="admin_approve_pwd_request.php" style="color: rgb(0,0,0)">View and Approve Password Reset Requests</a></p>
<p></p></div>
</div>
</div>
<div class="tabbedPanels" id="tabbed2">
			<ul class="tabs">
  <li><a href="#panel4" tabindex="4">Alumni Related Actions</a></li>
  <li><a href="#panel5" tabindex="5">Create Events</a></li>
</ul>

<div class="panelContainer">
<div id="panel4" class="panel">
<p><a href="admin_search.php" style="color: rgb(0,0,0)">Search Alumni Database</a></p>
<p><a href="admin_send_mail.php" style="color: rgb(0,0,0)">Send Mail</a></p>
<p><a href="admin_generate_users.php" style="color: rgb(0,0,0)">Create a Batch Of Users</a></p>
</div>

<div id="panel5" class="panel">
<p>Create Event (To be Linked With Admin Panel )</p>
<p></p></div>

</div>
</div>

		</div>
	</div>
	
</div>
  <div id="resources">
    <p class="open">+</p>
    <h2>Quick Functions</h2>
    <ul class="nav">
      <li><a href="admin_approve_pwd_request.php">Password Reset Requests</a></li>
      <li><a href="admin_forum_form.php">Create A Blog Post</a></li>
      <li><a href="admin_search.php">Search Alumni Database</a></li>
      <li><a href="admin_approve_forum_post.php">Pending Blog Posts</a></li>
      <li><a href="admin_send_mail.php">Compose Mail</a></li>
      <li><a href="admin_generate_users.php">Create Batch Of Users</a></li>
      <li><a href="admin_logout.php">Log Out</a></li>
    </ul>
    <h2>Links to Pages</h2>
    <ul class="nav">
      <li><a href="http://www.iiti.ac.in">IITI Website</a></li>
      <li><a href="index.php/">IITI Alumni Website</a></li>
      <li><a href="blog.php">Blog</a></li>
    </ul>
  </div>
</body>
</html>
