<?php
    require_once('connection.php');
    require_once('stringops.php');
    $branches=array('CSE', 'EE','ME');


    $name     ='';
    $batch    ='';
    $branch   ='';
    $email    ='';
    $phone    ='';
    $curr_loc ='';
    $perm_loc ='';
    $job      ='';
    $mem_id   ='';

    function fetchProfile($username, $visibility)
    {
      //v describes visibility
      global $con, $table, $name, $batch, $branch, $email, $phone, $curr_loc, $perm_loc, $job, $type, $img, $imgbool, $mem_id;
      $qry="SELECT * FROM $table WHERE username='$username'";
      $result=mysqli_query($con, $qry);
      $member   = mysqli_fetch_assoc($result);      
      $name     =$member['name'];
      $batch    =$member['batch'];
      $branch   =$member['branch'];
      $type     =$member['type'];
      $imgbool  =$member['imgbool'];
      $img      =$member['img'];
      $mem_id   =$member['mem_id'];
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