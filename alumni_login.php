<?php
        //Start session
        session_start();        

        if(isset($_SESSION['SESS_USERNAME']) && (trim($_SESSION['SESS_USERNAME']) != '')) 
        {
                header("location: home.php");
                exit();
        }
?>

<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  	<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  	<link rel="stylesheet" type="text/css" href="css/general.css">
  	<title>IIT Indore Alumni Login</title>
  	
</head>

<body>

<?php require_once('navbar_main.php');?>

<div class="container">
  <form name="loginform" action="login_exec.php" method="post" id="loginform" class="form-signin">

        <div class="col-lg-4 col-lg-offset-4">
        <div class="row">
        <div align="center"><h2 class="form-signin-heading">Alumni Login</h2></div> <br>
        <?php
                                if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) 
                                {
                                        //print error messages collected during login
                                        echo '<ul class="list-group">'; //unordered list formatting (ul)
                                        foreach($_SESSION['ERRMSG_ARR'] as $msg) 
                                        {
                                                echo '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove"></span>',$msg,'</li>'; 
                                        }
                                        echo '</ul>';
                                        unset($_SESSION['ERRMSG_ARR']);
                                }
        ?>

        <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <br>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
          </div>
        </div>
        <br>
        <div align="center"><a href="admin_pwd_reset_form.html">Forgot Login Credentials</a></div>
        <br>
        <div align="center"><a href="admin_index.php">Administrator Login</a></div>
        </div>
  </form>
</div>
<!--INCLUDE SCRIPTS NECESSARY FOR BOOTSTRAP COMPONENTS-->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
