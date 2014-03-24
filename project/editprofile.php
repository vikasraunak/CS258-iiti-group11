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
  <div align="center" class="largetext">Edit Profile</div>
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

  <title>Edit Profile</title>
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

  <form name="reg" action="edit_exec.php" method="post" id="reg">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td colspan="2">
          <div align="center">
            <?php 
                            if(count($_GET)==1)
                            {  
                              if($_GET['remarks']=='success')
                                echo 'Profile Information Updated!';
                              elseif($_GET['remarks']=='inactive') 
                              {
                                echo "Welcome, please update your profile to continue";
                              }
                              elseif ($_GET['remarks']=='fail')
                              {
                                if( isset($_SESSION['EDIT_ERRORS']) && is_array($_SESSION['EDIT_ERRORS']) && count($_SESSION['EDIT_ERRORS']) >0 ) 
                                {
                                        //print error messages collected during editing profile info
                                        echo '<ul class="err">'; //unordered list formatting (ul)
                                        foreach($_SESSION['EDIT_ERRORS'] as $msg) 
                                        {
                                                echo '<li>',$msg,'</li>'; 
                                        }
                                        echo '</ul>';
                                        unset($_SESSION['EDIT_ERRORS']);
                                }
                              }
                            }
                            ?>
          </div>
        </td>
      </tr>

      <tr>
        <td width="95">
          <div align="right">
            Full Name*:
          </div>
        </td>

        <td width="171"><input type="text" name="name"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Batch*:
          </div>
        </td>

        <td><input type="text" value="Eg: 2012" name="batch"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Email ID*:
          </div>
        </td>

        <td><input type="email" name="email"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Phone*:
          </div>
        </td>

        <td><input type="text" name="phone"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Current Location:
          </div>
        </td>

        <td><input type="text" name="curr_loc"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Permanent Location:
          </div>
        </td>

        <td><input type="text" name="perm_loc"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Current Occupation:
          </div>
        </td>

        <td><input type="text" value="Eg: POST at COMPANY" name="job"></td>
      </tr>

        <td colspan="2">
        <div align="center"><input name="submit" type="submit" value="Update"><input type="reset" value="Reset"></div>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
