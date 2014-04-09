<html>
<body>

<?php

include("connection.php");
$batch =$_POST["batch"];
$x = $_POST["first"];
$m = $_POST["last"];
$insert_sql =  "INSERT INTO alumni (username,password)
VALUES ($roll,$new)"; 
function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  

for (; $x<=$m; $x++)
  {  $message = "Please Login with your Roll .Update Your Profile as well.";
     $subject ="Your Account in IITI Alumni Website";
     $from = "admin@iiti.alumni.ac.in";
     $to = $batch.$x."@iiti.ac.in" ;
     $headers = "From:" . $from;
     $message = wordwrap($message, 70, "\r\n");
     $new = RandomPass(10) ;
     $message .= "\n new password is \" $new \". change this password after first login.";
     $retval = mail ($to,$subject,$message,$header);
 
   if( $retval == true ) 
 {
      echo "Mail $x sent successfully.";
   }
   else
   {
      echo "Mail $x could not be sent.";
   }
  }


?>
</body>
</html>
