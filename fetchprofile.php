<?php
    require_once('connection.php');
    function clean($str) 
    {
      $str = @trim($str);
      if( get_magic_quotes_gpc() ) 
      {
      //if magic quotes is running, remove slashes it added
        $str = stripslashes($str);
      }
      return mysql_real_escape_string($str);
    }
    $username = clean($_SESSION['SESS_USERNAME']);
    $password = clean($_SESSION['SESS_PASSWORD']);
    $qry="SELECT * FROM $table WHERE username='$username' AND password='$password'";
    $result=mysql_query($qry);
    $member   = mysql_fetch_assoc($result);
    $name     =$member['name'];
    $batch    =$member['batch'];
    $email    =$member['email'];
    $branch   =$member['branch'];
    $phone    =$member['phone'];
    $curr_loc =$member['curr_loc'];
    $perm_loc =$member['perm_loc'];
    $job      =$member['job'];
    $mem_id   =$member['mem_id'];
    $type     =$member['type'];
    $imgbool  =$member['imgbool'];
    $img      =$member['img'];
  
  
  ?>
