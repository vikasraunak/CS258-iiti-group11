<?php
    require_once('connection.php');
    $branches=array('CSE', 'EE','ME');
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

    $name     ='';
    $batch    ='';
    $branch   ='';
    $email    ='';
    $phone    ='';
    $curr_loc ='';
    $perm_loc ='';
    $job      ='';

    function fetchProfile($username, $visibility)
    {
      //v describes visibility
      global $table, $name, $batch, $branch, $email, $phone, $curr_loc, $perm_loc, $job;
      $qry="SELECT * FROM $table WHERE username='$username'";
      $result=mysql_query($qry);
      $member   = mysql_fetch_assoc($result);      
      $name     =$member['name'];
      $batch    =$member['batch'];
      $branch   =$member['branch'];
      if($visibility==1)
      {
        $email    =$member['email'];
        $phone    =$member['phone'];
        $curr_loc =$member['curr_loc'];
        $perm_loc =$member['perm_loc'];
        $job      =$member['job'];
      }
    }
    
  ?>