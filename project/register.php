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
  <form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post"
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
                              echo 'Add Alumni Here';
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

        <td><input type="text" name="password"></td>
      </tr>

        <td><input name="submit" type="submit" value="Submit"></td>
      </tr>
    </table>
  </form>
</body>
</html>
