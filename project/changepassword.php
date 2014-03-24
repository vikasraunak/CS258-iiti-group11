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

  <link rel="stylesheet" type="text/css" href="css/general.css">
  <div align="center" class="largetext">Change Password</div>
  <!-- <script type="text/javascript">

  function validateForm()
  {
    var a=document.forms["reg"]["name"].value;
    var b=document.forms["reg"]["batch"].value;
    var c=document.forms["reg"]["email"].value;
    var d=document.forms["reg"]["phone"].value;

    if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") )
    {
      alert("All fields must be filled out");
      return false;
    }
    if (a==null || a=="")
    {
      alert("Username cannot be empty");
      return false;
    }
    if (b==null || b=="")
    {
      alert("Password cannot be empty");
      return false;
    }
    if (c==null || c=="")
    {
      alert("Username cannot be empty");
      return false;
    }
    if (d==null || d=="")
    {
      alert("Password cannot be empty");
      return false;
    }
  
  }
  </script> -->

  <title>Change Password</title>
</head>

<body>

  <table width="500" align="center" cellpadding="10">
    <tr>
      <td align="center">
          <a href="home.php">Home</a>
      </td>
      <td align="center">
          <a href="profile.php">Profile</a>
      </td>
      <td align="center">
          <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>

  <br>

  <form name="reg" action="changepass_exec.php" method="post" id="reg">
    <table width="500" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td colspan="2">
          <div align="center">
            <?php 
                            if(count($_GET)==1)
                            {  
                              if($_GET['remarks']=='success')
                                echo 'Password changed successfully';
                              elseif($_GET['remarks']=='inactive') 
                              {
                                echo "Welcome, please update your profile to continue.";
                              }
                              elseif ($_GET['remarks']=='fail')
                              {
                                if( isset($_SESSION['CP_ERRORS']) && is_array($_SESSION['CP_ERRORS']) && count($_SESSION['CP_ERRORS']) >0 ) 
                                {
                                        //print error messages collected during editing profile info
                                        echo '<ul class="err">'; //unordered list formatting (ul)
                                        foreach($_SESSION['CP_ERRORS'] as $msg) 
                                        {
                                                echo '<li>',$msg,'</li>'; 
                                        }
                                        echo '</ul>';
                                        unset($_SESSION['CP_ERRORS']);
                                }
                              }
                            }
                            ?>
          </div>
        </td>
      </tr>
      </table>
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td width="95">
          <div align="right">
            Old Password:
          </div>
        </td>

        <td width="171"><input type="password" name="oldpass"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            New Password:
          </div>
        </td>

        <td><input type="password" name="newpass"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Re-enter New Password:
          </div>
        </td>

        <td><input type="password" name="newpass2"></td>
      </tr>

     
      <tr>
        <td colspan="2">
        <div align="center"><input name="submit" type="submit" value="Update"><input type="reset" value="Reset"></div>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
