<?php
        //Start session

        if(isset($_SESSION['SESS_USERNAME_ADMIN']) && (trim($_SESSION['SESS_USERNAME_ADMIN']) != '')) 
        {
                header("location: admin_home.php");
                exit();
        }
?>

<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Admin Login</title>
 
</head>

<body>

<?php require_once('navbar_main.php');?>

  <form name="loginform" action="admin_login_exec.php" method="post" id="loginform">
    <table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
      <tr>
        <td colspan="2">
        <?php
                                if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) 
                                {
                                        //print error messages collected during login
                                        echo '<ul class="err">'; //unordered list formatting (ul)
                                        foreach($_SESSION['ERRMSG_ARR'] as $msg) 
                                        {
                                                echo '<li>',$msg,'</li>'; 
                                        }
                                        echo '</ul>';
                                        unset($_SESSION['ERRMSG_ARR']);
                                }
        ?>
        </td>
      </tr>
      <tr>
        <td width="116">
          <div class="c1">
            Username
          </div>
        </td>

        <td width="177"><input name="username" type="text"></td>
      </tr>

      <tr>
        <td>
          <div class="c1">
            Password
          </div>
        </td>

        <td><input name="password" type="password"></td>
      </tr>

      <tr>
        <td>
          <div class="c1"></div>
        </td>

        <td><input name="" type="submit" value="Login" class="c2"></td>
      </tr>
    </table>
  </form>

<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>
