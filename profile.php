<!--  NOTE!! Do not forget to add username, password and database name on getImage.php And you will need to update
your alumni database table. Instructions for that would be on updatetable.txt-->

<?php
        require_once('auth.php');
?>


<!--Dont forget to add edit profile-->

<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Profile</title>
</head>

<body>
  <?php
    require_once('navbar.php');
    require_once('stringops.php');
    $paramed=count($_GET);
    require_once('fetchprofile.php');
    if ($paramed==1) 
    {
      $username=trim($_GET['param']);
      if($username==$_SESSION['SESS_USERNAME'])
      {
        $paramed=0;
        fetchProfile($username,1);
      }
      else
        fetchProfile($username,canView($_SESSION['SESS_USERNAME'],$username));
    }
    else
    {
      $username=$_SESSION['SESS_USERNAME'];
      fetchProfile($username,1);
    }
    
  ?>



<div class="containter">

<div class="col-md-4 col-md-offset-4">

  <div class="panel panel-default">
  <div class="panel-heading">
    
    <?php 
      if ($imgbool==1) {

    ?>
    <div align="center"  class="panel-heading"><?php
                                        
                                       /* if ( !($result = mysql_query($query,$con)) ) {
                                          die('<p>Error reading database</p></body></html>');
                                        } else {
                                              $row = mysql_fetch_assoc($result);*/
                                            ?><a href="profile.php"><?php
                                              echo '<img width="100"  src="getImage.php?id=' . $mem_id. '"/>  ' . "\n";
                                              ?></a><?php
                                          //}    
                                    //mysql_close($con);

}
?></div>
    <div align="center"><h3><b><?php echo $username;?><b></h3></div>
  <table class="table table-striped">
  <tbody>
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
          Branch:
        </div>
      </td>

      <td valign="top"><?php echo $branch ?></td>
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
  </tbody>
  </table>

  <div class="panel-footer" align="right">
    <?php
    if ($paramed==1)
    {
      echo '<a href="#"><span class="glyphicon glyphicon-user"></span> Send Visibility Request</a>';
    }
    else
      echo '<a href="editprofile.php"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
    ?>
  </div>


  </div>
  </div>
</body>
</html>
