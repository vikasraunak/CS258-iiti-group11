<html>
<body>

<?php

include("con_config.php");
$subject ="Your Account in IITI Alumni Website";
$emails= $_POST['email'];
$message = "Please Login with your Roll and this Password.Update Your Profile as well.
                   
";
$ new = RandomPass(10) ;    
$insert_sql = "INSERT INTO alumni (name,branch,batch,email,........ " ;
                      -------------------------- ------- -------- // New password new  and roll number 


function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  

$from = "admin@iiti.alumni.ac.in";
$headers = "From:" . $from;
$message = wordwrap($message, 70, "\r\n");

 $retval = mail ($to,$subject,$message,$header);
   if( $retval == true ) 
 {
      echo "Mail sent successfully.";
   }
   else
   {
      echo "Mail could not be sent.";
   }

?>
</body>
</html>