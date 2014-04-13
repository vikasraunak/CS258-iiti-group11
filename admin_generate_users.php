<html>
<body>
<link href="css/admin_css/site.css" rel="stylesheet">
<?php 
	require "admin_auth.php";
?>

<form action="admin_new_user.php" method="post">
<p>Enter the Batch name (e.g. cse , phd)<BR></p>
<input name='batch' type='text' />
<p>Enter the First Roll Of the Batch (e.g. 1200259)<BR></p>
<input name='first' type='text' />
<p>Enter the Last Roll of the batch (e.g. 1200275)<BR></p>
<input name='last' type='text' />
<br><br>
<p>Enter complete roll number of the students whom you want to exclude from these roll numbers(e.g. 1200265)<BR>(multiple roll numbers should be separated by ; only e.g.(1200264;1200271) )<br></p>
<input name='exclude' type='text' /><br>
<br>
<p>Enter complete roll number of the students whom you want to include with these roll numbers(e.g. me1100111)<BR>(multiple roll numbers should be separated by ; only e.g.(phd1100122;me320045) )<br></p>
<input name='include' type='text' /><br>
<br>
<input type="submit">
</form>

</body>
</html>
