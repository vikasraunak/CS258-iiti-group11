<!DOCTYPE html>
<?php 
	require_once('admin_auth.php');
?>

<html>
<head>
<meta charset="UTF-8">
<title>In Page Viewer</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<link href="js/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script src="js/admin_js/jquery.easing.1.3.js"></script>
<script src="js/fancybox/jquery.fancybox-1.3.4.min.js"></script>
<script>
$(document).ready(function() {
	$('.iframe').fancybox({
		width : '90%',
		height : '90%',
		titlePosition: 'outside'
	});
}); // end ready
</script>
</head>
<body>
<div class="wrapper">
<div class="content">
	<div class="main">
		<h1>Check the Pages Of the Website !</h1>
	<ul>
    <li><a href="admin_home.php" class="iframe" title="IITI Alumni Website">Admin Home page</a></li>
    <li><a href="index.php" class="iframe" title="Alumni Login Page">Alumni Login Page</a></li>
    <li><a href="admin_forum_form.html" class="iframe" title="Form for Forum Post">Form for Forum Post</a></li>
    <li><a href="admin_send_mail.html" class="iframe" title="Mail Page">Mail Page</a></li>
    <li><a href="admin_display_public_forum.php" class="iframe" title="Public Forum">Public Forum</a></li>
    <li><a href="admin_Election_Invite.html" class="iframe" title="Election Form">Election Form</a></li>
  	</ul>
	</div>
</div>
</div>
</body>
</html>