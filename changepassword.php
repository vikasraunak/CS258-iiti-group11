<?php
  session_start();
  if(!isset($_SESSION['SESS_USERNAME']) || (trim($_SESSION['SESS_USERNAME']) == '')) 
  {
    //check if logged in or not
    header("location: index.php");
    exit();
  }
?>

<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Change Password</title>
</head>

<body>

  <?php
    require_once('navbar.php');
  ?>
<div class="container">
  <h3 align="center">Change Password</h3>

  <div class="col-md-4 col-md-offset-4">
  <ul class="list-group">
            <?php 
                            if(count($_GET)==1)
                            {  
                              if($_GET['remarks']=='success')
                                echo '<li class="list-group-item list-group-item-success">Password changed successfully</li>';
                              elseif ($_GET['remarks']=='fail')
                              {
                                if( isset($_SESSION['CP_ERRORS']) && is_array($_SESSION['CP_ERRORS']) && count($_SESSION['CP_ERRORS']) >0 ) 
                                {
                                        //print error messages collected during editing profile info
                                        foreach($_SESSION['CP_ERRORS'] as $msg) 
                                        {
                                                echo '<li class="list-group-item list-group-item-danger">',$msg,'</li>'; 
                                        }
                                        unset($_SESSION['CP_ERRORS']);
                                }
                              }
                            }
                            ?>
  </ul>
  <form name="reg" action="changepass_exec.php" method="post" id="reg">
          <div for="oldpass">
            Old Password:
          </div>
          <input type="password" name="oldpass" class="form-control" required autofocus>
          <br>
          <div for="newpass" >
            New Password:
          </div>
          <input type="password" name="newpass" class="form-control" required>

          <div for="newpass2">
            Re-enter New Password:
          </div>
          <input type="password" name="newpass2" class="form-control" required>
          <br>
          <div align="center"><input name="submit" class="btn btn-primary" type="submit" value="Update"><span> </span><input type="reset" class="btn btn-primary" value="Reset"></div>
  </form>
  </div>

</div>
</body>
</html>
