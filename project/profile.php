<?php
        require_once('auth.php');
?>

<html>
<head>

  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/general.css" />
  <div align="center" class="largetext">Profile</div>
</head>

<body>
  <?php
    require_once('connection.php');
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
    $username = clean($_SESSION['SESS_USERNAME']);
    $password = clean($_SESSION['SESS_PASSWORD']);
    $qry="SELECT * FROM $table WHERE username='$username' AND password='$password'";
    $result=mysql_query($qry);
    $member   = mysql_fetch_assoc($result);
    $name     =$member['name'];
    $batch    =$member['batch'];
    $email    =$member['email'];
    $phone    =$member['phone'];
    $curr_loc =$member['curr_loc'];
    $perm_loc =$member['perm_loc'];
    $job      =$member['job'];
  ?>

  <table width="500" align="center" cellpadding="10">
    <tr>
      <td align="center">
          <a href="home.php">Home</a>
      </td>
      <td align="center">
          <a href="editprofile.php">Edit Profile</a>
      </td>
 <td align="center">
          <a href="send_mail.html">Send Message</a>
      </td>
      <td align="center">
          <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>

  <br>

  <table width="500" border="0" align="center" cellpadding="10">

    <tr>
      <td valign="top">
        <div class="c2">
          Name:
        </div>
      </td>

      <td valign="top"><?php echo $name ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Batch:
        </div>
      </td>

      <td valign="top"><?php echo $batch ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Phone:
        </div>
      </td>

      <td valign="top"><?php echo $phone ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Email ID:
        </div>
      </td>

      <td valign="top"><?php echo $email ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Current Location:
        </div>
      </td>

      <td valign="top"><?php echo $curr_loc ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Permanent Location:
        </div>
      </td>

      <td valign="top"><?php echo $perm_loc ?></td>
    </tr>

    <tr>
      <td valign="top">
        <div class="c2">
          Occupation:
        </div>
      </td>

      <td valign="top"><?php echo $job ?></td>
    </tr>

  </table>
</body>
</html>