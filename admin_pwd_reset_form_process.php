<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Password Reset Form</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function() {

}); // end ready
</script>
</head>
<body>



<?php
  include "connection.php"; 

function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
} 

if((isset($_POST['email']) AND trim($_POST['email']) != "")) {
   
    $email = stripslashes($_POST['email']); 
    $email= mysql_real_escape_string($email);
  $sql= "SELECT `email`,`username` FROM $table WHERE `email`='$email'";
  $result=mysql_query($sql) or die('could not update query');
  
  if(mysql_num_rows($result) > 0) {
      $member   = mysql_fetch_assoc($result);      
      $mail     =$member['email'];
      $usrnam  =$member['username'];
      $pwd=RandomPass(10);
      $sql2="UPDATE `alumni` SET `password`='$pwd' WHERE `username`='$usrnam' ";
      $qr2=mysql_query($sql2) or die("$usrnam could not found");
      //echo $mail;
      $to=$mail;
      $headers='From: admin@alumni.iiti.ac.in';
      $sub='Password Reset at IITI alumni';
      $body="Hi\n Your alumni website username is : $usrnam \nYour alumni website password is :$pwd \n Please update your credentials after login.\n Thanks. \n IITI alumni team.";
      mail($to,$sub,$body,$headers) or die('Could not send mail');
    }else {
      die("<br><h4><p> This email id not matching to any email id in database. <br>Please enter the email id you have already entered in your alumni account  </p></h4>");
    }
  /*if($resultt!=1){
    echo 'failure';
    die('<h3>could not find this email<h3>');
  }else{ echo 'success';}*/

}
else{
  die("<br><br><h2><p>Enter all the fields correctly</p></h2>");
}
?>



<div class="wrapper">
  <div class="header">
    <p class="logo">IIT<i> </i> Indore <i class="mm">IITI<br>
      Alumni<br>
      Network</i></p>
  </div>
  <div class="content">
    <div class="main">
      <h1>Form Processed</h1>
      <p>Yay ! You've successfully submitted the form. </br>
                                                            Your new password is sent to <u> <?php echo $email?> </u></br>
                                                            You will receive an e-mail shortly on your primary mail.
                                                     </p>
      
    </div>
  </div>

  <div class="footer1">
    <p>Return to <a href="http://www.iiti.ac.in"> IITI Website</a> Or <a href="http://www.iiti.ac.in">IITI Alumni Network</a>.</p>
  </div>
</div>
</body>
</html>
