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

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


  <title>Edit Profile</title>
</head>

<body>

<!--NAVIGATION BAR START-->
  <?php require_once('navbar.php'); 

        require_once('fetchprofile.php');
        $username=$_SESSION['SESS_USERNAME'];
        fetchProfile($username,1);
  ?>
<!--NAVIGATION BAR END-->

  <form name="reg" action="edit_exec.php" method="post" id="reg" class="form-horizontal" role="form">
    <div class="container">


    <div class="col-md-4 col-md-offset-4">


      <div class="row">
        <?php 
                            if(count($_GET)==1)
                            {  
                              if($_GET['remarks']=='success')
                                echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span> Profile Information Updated<br>Back to <a href="profile.php">Profile</a></div>';
                              elseif($_GET['remarks']=='inactive') 
                              {
                                echo '<div class="alert alert-info"><span class="glyphicon glyphicon-asterix"></span> First Time Login</div>';
                              }
                              elseif ($_GET['remarks']=='fail')
                              {
                                if( isset($_SESSION['EDIT_ERRORS']) && is_array($_SESSION['EDIT_ERRORS']) && count($_SESSION['EDIT_ERRORS']) >0 ) 
                                {
                                        //print error messages collected during editing profile info
                                        echo '<ul class="list-group">'; //unordered list formatting (ul)
                                        foreach($_SESSION['EDIT_ERRORS'] as $msg) 
                                        {
                                                echo '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove"></span> '.$msg.'</li>'; 
                                        }
                                        echo '</ul>';
                                        unset($_SESSION['EDIT_ERRORS']);
                                }
                              
                            }
                          }
            ?>
      </div>

      <div class="row">
        <div class="panel panel-default">
          <?php 
          if ($imgbool==1) {

          ?>
          <div align="center"  class="panel-heading"><?php
                                        /*
                                        $temp_username=$_SESSION['SESS_USERNAME'];
                                        $query = "SELECT mem_id,name,img,imgbool,username FROM alumni WHERE username='$temp_username' ";
                                        if ( !($result = mysql_query($query,$con)) ) {
                                          die('<p>Error reading database</p></body></html>');
                                        } else {
                                              $row = mysql_fetch_assoc($result);*/?>
                                              <a href="profile.php"><?php
                                              echo '<img width="100"  src="getImage.php?id=' . $mem_id . '"/>  ' . "\n";
                                              ?> </a> <?php
                                          //}    
                                    //mysql_close($con);

}
?> <input type="file" size="40" name="userFile"/></div>
          <div class="panel-heading" align="center"><h3>Edit Profile</h3></div>
            <table class="table table-striped" align="center">
        <tr>
          <td>
            <div for="name">Full Name:</div>
          </td>
          <td><input type="text" class="form-control" name="name" placeholder="Jose Mourinho" value="<?php echo $name;?>" required></td>
        </tr>

        <tr>
        <td>
          <div>
            Batch:<br>[Year of passing out]
          </div>
        </td>

        <td>
        <select name="batch" class="form-control" required>
    	<?php for ($i = 2013; $i <= 2099; $i++) 
    		{
    			if(intval($batch)==$i)
    			{?>
        			<option class="form-control" value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
           		<?php }
        		else
    			{?>
        		<option class="form-control" value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }
   			} ?>	
		</select>
        <!--input type="text" class="form-control" placeholder="2012" name="batch" value="<?php echo $batch;?>" required-->
        </td>
        </tr>


        <tr>
        <td>
          <div>
            Branch:
          </div>
        </td>

        <td>
        	<select name="branch" class="form-control" required>
        		<?php for ($i = 0; $i < count($branches); $i++) 
    			{
    				if($branches[$i]==$branch)
    				{	
    					?>
        				<option class="form-control" value="<?php echo $branches[$i]; ?>" selected><?php echo $branches[$i]; ?></option>
           				<?php 
           			}
        			else
    				{
    					?>
        				<option class="form-control" value="<?php echo $branches[$i]; ?>"><?php echo $branches[$i]; ?></option>
        				<?php 
        			}
   				} ?>	
        	</select>
        </td>
        </tr>


        <tr>
        <td>
          <div>
            Email ID:
          </div>
        </td>

        <td><input type="email" name="email" class="form-control" value="<?php echo $email;?>" required placeholder="no_trophies@arsenal.co.uk"></td>
        </tr>

        <tr>
        <td>
          <div>
            Phone:
          </div>
        </td>

        <td><input type="text" name="phone" class="form-control" placeholder="9871124100" required value="<?php echo $phone;?>"></td>
        </tr>

        <tr>
        <td>
          <div>
            Current Location:
          </div>
        </td>

        <td><input type="text" class="form-control" placeholder="London" name="curr_loc" value="<?php echo $curr_loc;?>"></td>
        </tr>

        <tr>
        <td>
          <div>
            Permanent Location:
          </div>
        </td>

        <td><input type="text" class="form-control" placeholder="Lisbon" name="perm_loc" value="<?php echo $perm_loc;?>"></td>
        </tr>

        <tr>
        <td>
          <div align="right">
            Current Occupation:
          </div>
        </td>

        <td><input type="text" class="form-control" placeholder="Manager at Chelsea FC" name="job" value="<?php echo $job;?>"></td>
        </tr>

        <tr>
        <td colspan="2">
        <div align="center"><input name="submit" class="btn btn-primary" type="submit" value="Save"></div>
        </td>
        </tr>

            </table>
        </div>
      </div>
    </div>
    </div>


  </form>
</body>
</html>
