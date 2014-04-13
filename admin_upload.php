<?php 
require_once('admin_auth.php');
?>

<html>
<body>
<title>File Upload</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<form enctype="multipart/form-data" action="admin_upload.php" method="POST">
 Please choose a file: <input name="uploaded" type="file" /><br />
 <input type="submit" value="Upload" />
 </form>

</body>
</html> 