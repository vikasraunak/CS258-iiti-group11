<html>
</body> 
<?php 
 $target = "upload/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 
 //Here we check that $ok was not set to 0 by an error , No Restrictions on file are there : No use of $ok
 if ($ok==0) 
 { 
 Echo "Sorry your file was not uploaded"; 
 }
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded"; 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 } 
 ?>
</body>
</html>
