<?php
        require_once('auth.php');
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/general.css">

  <title>Welcome Alumni</title>
  <div align="center" class="largetext"> Alumni Home</div>
</head>

<body>
  <table width="400" align="center" cellpadding="5">
    <tr>
      <td align="center"><a href="profile.php">Profile</a></td>

      <td align="center"><a href="search.php">Search</a></td>

      <td align="center"><a href="changepassword.php">Change Password</a></td>

      <td align="center"><a href="logout.php">Logout</a></td>
    </tr>
  </table>

  <div align="center">
    <p><b>Logged in as <?php $username=$_SESSION['SESS_USERNAME']; echo $username; ?></b></p>
    <br>
    <p>Notification panel appears here.</p>
  </div>
</body>
</html>
