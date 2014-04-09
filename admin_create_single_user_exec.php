<html>
<body>

<?php

include("connection.php");
$roll =$_POST["roll"];

function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  

  $message = "Please Login with your Roll .Update Your Profile as well.";
     $subject ="Your Account in IITI Alumni Website";
     $from = "alumni@iiti.ac.in";
     $to = $roll."@iiti.ac.in" ;
     $headers = "From:" . $from;
     $message = wordwrap($message, 70, "\r\n");
     $new = RandomPass(10) ;
     $message .= "\n new password is \" $new \". change this password after first login.";
     //$retval = mail ($to,$subject,$message,$headers);
     $insert_sql =  "INSERT INTO alumni (username,password)
     VALUES ('$roll','$new')"; 
     mysql_query($insert_sql) or die('error in updating database');
 /*
   if( $retval == true ) 
 {
      echo "Mail to $x sent successfully.";
   }
   else
   {
      echo "Mail to $x could not be sent.";
   }*/
   print "<br>";


?>

<br>
<br>
<br>
<br>
<a href="admin_home.php">Go to Admin home</a>
<br>
<a href="admin_create_single_user.php"> Or go back to generate new user..</a>
</body>
</html>
