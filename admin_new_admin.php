<?php 
/*	require_once('admin_auth.php');
?>

<html>
<body>
</body>
<head>
<form action="admin_new_admin_exec.php" method="post">
	<br>
	<strong><h5>USERNAME</h5></strong>
	<input type="text" name="username" placeholder="username">

	<strong><h5>PASSWORD</h5></strong>
	<input type="password" name="password">
	<br>
	<input type="submit" name="submit" value="submit">
</form>
</head>
</html>
*/
require_once('admin_auth.php');
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <script type="text/javascript">

  function validateForm()
  {
    var a=document.forms["reg"]["username"].value;
    var b=document.forms["reg"]["password"].value;

    if ((a==null || a=="") && (b==null || b=="") )
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
  
  }
  </script>

  <title>Add Alumni</title>
</head>

<body>
  <form name="reg" action="admin_new_admin_exec.php" onsubmit="return validateForm()" method="post"
  id="reg">
    <table width="274" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td colspan="2">
          <div align="center">
            <?php 
                            if(count($_GET)==1)
                            {  
                              echo 'Registration Success';
                            }
                            else
                            {
                              echo 'Add Admin Here';
                            }
                            ?>
          </div>
        </td>
      </tr>

      <tr>
        <td width="95">
          <div align="right">
            Username:
          </div>
        </td>

        <td width="171"><input type="text" name="username"></td>
      </tr>

      <tr>
        <td>
          <div align="right">
            Password:
          </div>
        </td>

        <td><input type="password" name="password"></td>
      </tr>

        <td><input name="submit" type="submit" value="Submit"></td>
      </tr>
    </table>
  </form>
</body>
</html>
