<html>
<body>

<?php

include("connection.php");
require_once('admin_auth.php');
$batch =$_POST["batch"];
$x = $_POST["first"];
$m = $_POST["last"];
$ex=$_POST["exclude"];
$in=$_POST["include"];

function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  
$flagin=0;
$flagex=0;
$flag2=0;
$flag3=0;
$j=0;
if(trim($in)!=''){
  $inr=explode(";",$in);
  $inl=count($inr);
  $flagin=1;

}
if(trim($ex)!=''){
  $exr=explode(";",$ex);
  $exl=count($exr);
  $flagex=1;
}

for (; $x<=$m; $x++)
  {  $flag2=0;
     if($flagex==1){
        for($i=0;$i<$exl;$i++){
          if($x==$exr[$i]){
            $flag2=1;
            //break;
          }
        }
     }
     if($flag2==1 || $flag3==1){
      goto SKIPP;
     }
     $message = "Please Login with your Roll .Update Your Profile as well.";
     $subject ="Your Account in IITI Alumni Website";
     $from = "alumni@iiti.ac.in";
     $to = $batch.$x."@iiti.ac.in" ;
     $headers = "From: ". $from;
     $message = wordwrap($message, 70, "\r\n");
     $new = RandomPass(10) ;
     $message .= "\n new password is \" $new \". change this password after first login.";
     $retval = mail ($to,$subject,$message,$headers);
     //echo $message;
     $roll = $batch.$x ;
     $insert_sql =  "INSERT INTO alumni (username,password)
     VALUES ('$roll','$new')"; 
     mysql_query($insert_sql);
   if( $retval == true ) 
 {
      echo "Mail to $batch"."$x sent successfully.";
   }
   else
   {
      echo "Mail to $batch"."$x could not be sent.";
   }
   print "<br>";
   SKIPP:
   if($x==$m  &&  $flagin==1 && $j<$inl){
    $x=$inr[$j];
    //$x=$m - 1;
    $j++;
    $message = "Please Login with your Roll .Update Your Profile as well.";
     $subject ="Your Account in IITI Alumni Website";
     $from = "alumni@alumni.iiti.ac.in";
     $to = $x."@iiti.ac.in" ;
     $headers = "From: ". $from;
     $message = wordwrap($message, 70, "\r\n");
     $new = RandomPass(10) ;
     $message .= "\n new password is \" $new \". change this password after first login.";
     $retval = mail ($to,$subject,$message,$headers);
     //echo $message;
     $roll = $batch.$x ;
     $insert_sql =  "INSERT INTO alumni (username,password)
     VALUES ('$roll','$new')"; 
     mysql_query($insert_sql);
   if( $retval == true ) 
 {
      echo "Mail to $x sent successfully.";
   }
   else
   {
      echo "Mail to $x could not be sent.";
   }
   print "<br>";
   $x=$m -1;
   $flag3=1;
   }
  }


?>

<br>
<br>
<br>
<br>
<a href="admin_home.php">Go to Admin home</a>
<br>
<a href="admin_generate_users.html"> Or go back to generate new users..</a>
</body>
</html>
