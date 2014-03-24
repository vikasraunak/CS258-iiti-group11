<?php
        //Start session
        session_start();        

        if(isset($_SESSION['SESS_USERNAME']) && (trim($_SESSION['SESS_USERNAME']) != '')) 
        {
                header("location: home.php");
                exit();
        }
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="/css/general.css">
  <div align="center" class="largetext">IIT Indore<br>Alumni Website</div>
  <title>Admin Login</title>
  <style type="text/css">
input.c2 {font-family:'Trebuchet MS';}
  div.c1 {text-align: right}
  </style>
</head>

<body>
  <form name="loginform" action="login_exec.php" method="post" id="loginform">
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
</body>
</html>
