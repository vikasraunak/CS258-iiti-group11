<?php 

include "fetchprofile.php"; 

include "admin_auth.php";

function RandomPass($numchar)  
{  
    $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";  
    $array=explode(",",$word);  
    shuffle($array);  
    $newstring = implode($array,"");  
    return substr($newstring, 0, $numchar);  
}  

if(isset($_POST['submit_ap'])){
  $arrDEL = array(); 
  $arrAPP = array(); 
  foreach($_POST['action'] as $pr_id => $thisACTION){
    if($thisACTION == "APP"){
      $arrAPP[] = $pr_id;
      $arrDEL[] = $pr_id;
      }
    else{
      $arrDEL[] = $pr_id; 
    }
  }
  if($arrAPP){
    $sql_in = implode(",", $arrAPP); 
    $sql  = " UPDATE `p_reset` SET `pr_status`=1 WHERE `pr_id` IN ($sql_in) "; 
    $qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 

    $sql  = "SELECT `pr_branch`,`pr_mail`,`pr_roll` FROM `p_reset` WHERE `pr_status`=1 ";
    $qry  = mysqli_query($con, $sql) or die('failure in running sql query');
    
    while($arr  = mysqli_fetch_assoc($qry)){
      $usrnam =$arr['pr_roll'];
      $pwd=RandomPass(10);
      $pwdhash=hash('sha256',$pwd);
      $sql2="UPDATE `alumni` SET `password`='$pwdhash' WHERE `username`='$usrnam' ";
      $qr2=mysqli_query($con, $sql2) or die("query unsuccessful");

      $to=$arr['pr_mail'];
      $headers='From: admin@alumni.iiti.ac.in';
      $sub='Password Reset at IITI alumni';
      $body="Hi\n Your alumni website username is : $usrnam \nYour alumni website password is :$pwd \n Please update your credentials after login.\n Thanks. \n IITI alumni team.";
      $retval=mail($to,$sub,$body,$headers) or die('Could not send mail');
      if($retval ==1){
        echo "mail sent to $to successfully..";
        print "<br>";
      }
      else{
        echo "failed to send mail..";
        print "<br>";
      }
    }
  }

  if($arrDEL){
    $sql_in = implode(",", $arrDEL); 
    $sql  = " DELETE FROM `p_reset` WHERE `pr_id` IN ($sql_in) "; 
    $qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 
  } 
}
print "<br>";

$sql  = " SELECT `pr_id`,`pr_img`,`pr_type`,`pr_branch`,`pr_imgbool`,`pr_roll`, `pr_mail`, DATE_FORMAT(`pr_date`, '%M %D, %Y at %H:%i') as `pr_date` FROM `p_reset` "; 
$sql .= " WHERE `pr_status`=0 ORDER BY `pr_id` "; 
$qry  = mysqli_query($con, $sql) or die("SQL Error: $sql<br>" . mysqli_error($con)); 

print "<h2>List of Requests pending approval:<h2><br>"; 
print "<form method='post' action='{$_SERVER['PHP_SELF']}'>"; 
print "<table border=1>"; 
  print "<tr>"; 
  print "<td><h4>Approve</h4></td>"; 
  print "<td><h4>Remove</h4></td>"; 
  print "<td><h4>Request By</h4></td>"; 
  print "<td><h4>Entered Form Inputs</h4></td>"; 
  print "<td><h4>Uploaded Image</h4></td>";
  print "</tr>"; 


while($row = mysqli_fetch_array($qry)){
  print "<tr>"; 
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='APP'></td>";
  print "<td><input type='radio' name='action[{$row['pr_id']}]' value='DEL'></td>";
  fetchprofile($row['pr_roll'],1);
  
    print "<td>"; 
    print "&nbsp;&nbsp;(Requested by <strong>" . $name . "</strong> <br> "."&nbsp;&nbsp;on<strong> " . $row['pr_date'] . ")". "</strong>"."</td>"; 
    print "<td>" ."&nbsp;Username <strong>:". $row['pr_roll'] .  "</strong><br>";
    print "&nbsp;Name:<strong> ".$name."</strong><br>"; 
    print "&nbsp;Date of Birth: <strong>".$dob."</strong><br>";
    print "&nbsp;Current location:<strong> ".$curr_loc."</strong><br>";
    print "&nbsp;permanent location: <strong>".$perm_loc."</strong><br>";
    print "&nbsp;phone number: <strong>".$phone."</strong><br>";
    // These results must be queried from the database alumni : Have to put the search and then print inside the table
    print "<td>";
    if ($row['pr_imgbool'] == 1) {
      echo '<img width="300"  src="admin_getImage.php?id=' . $row['pr_id'] . '"/>  ' . "\n";
    }else{print "<strong>"."&nbsp;image is not uploaded"."</strong>";}
    print "</td>";
    print "</tr>";  
}

print "</table>";
mysqli_close($con); 

print "<input type='submit' name='submit_ap' value='Process'>"; 
print "</form>"; 
?>
