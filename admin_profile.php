<!--  NOTE!! Do not forget to add username, password and database name on getImage.php And you will need to update
your alumni database table. Instructions for that would be on updatetable.txt-->

<?php
        require('admin_auth.php');
?>


<!--Dont forget to add edit profile-->

<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Profile</title>
</head>

<body>

  <?php
    require_once('stringops.php');
    $paramed=count($_GET);
    require_once('fetchprofile.php');
    if ($paramed==1) 
    {
      $username=trim($_GET['param']);
      fetchProfile($username,1);
      $canView=1;
    }
    
  ?>



<div class="containter">

<div class="col-md-4 col-md-offset-4">
  
  <div class="well">
    <h4><a href="admin_home.php"><span class='glyphicon glyphicon-home'></span> Back to Admin Home</a></h4>
    <h4><a href="admin_search.php"><span class='glyphicon glyphicon-search'></span> Back to Search</a></h4>
  </div>

  <div class="panel panel-info">
  <div class="panel-heading" align="center">
    
    <?php 
      if ($imgbool==1) {

    ?>
    <?php
                                        
                                          
                                         /* if ( !($result = mysql_query($query,$con)) ) {
                                            die('<p>Error reading database</p></body></html>');
                                          } else {
                                                $row = mysql_fetch_assoc($result);*/
                                              ?>
                                              
                                              <a href="profile.php">
                                                <?php
                                                  echo '<img width="100" class="img-circle" src="getImage.php?id='.$mem_id. '"/>';
                                                ?>
                                              </a>
                                              

  <?php
                                            //}    
                                      //mysql_close($con);
  }
  ?>
  <h3><b><?php echo $username;?><b></h3>
  </div>

  <table class="table table-striped">
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
  </table>

  </div>
  </div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
