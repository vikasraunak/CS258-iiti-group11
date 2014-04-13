<html>
<body>
<?php 
require_once('admin_auth.php');
?>
<link href="css/admin_css/site.css" rel="stylesheet">


<form action="admin_send_mail_exec.php" method="post">
 Subject: <input type="text" name="subject"><br>
 <p>Recipient(s)<BR></p>
<TEXTAREA Name="emails[]" rows="2" cols="50"></TEXTAREA>
<p>Your Message<BR></p>
<TEXTAREA Name="message" rows="20" cols="100"></TEXTAREA>
<input type="submit" value="Submit">
</form>

</body>
</html>
