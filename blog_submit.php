<?php require('auth.php');?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <title>Write Blog Post</title>

</head>
<body>
<?php require_once('navbar.php');?>
<div class="container">
  <div class="col-md-6 col-md-offset-3">
  	<div class="well">
  	<h3><b>Write Blog Post</b></h3>
    <form action="blog_exec.php" id="subForm" name="subForm" method="post" >
    
 <p><label for="title" >Title Post</label>
      <input type="text" name="title" id="title" /></p>


	  <p>
	    <span >Who is this Post Aimed at ?</span><br>
	    <label>
	    <input name="aud" type="radio" value="1" />Anybody</label>
	    <label>
	    <input name="aud" type="radio" value="2" />For Institute</label>
	    <label>
	    <input name="aud" type="radio" value="3" />For Students</label>
	  </p>
	  <p>
	    <label for="refer" >What is this Post About ?</label>
	    <select name="refer" id="refer">
	      <option value="null">Select One</option>
	      <option value="1">Academics</option>
	      <option value="2">Professional Opportunities</option>
	      <option value="3">Institute Experience/Events</option>
	      <option value="4">General</option>
        </select>
	  </p>
	  <p>
	    <label for="ppost" > The Main Post </label><br>
        <textarea name="ppost" cols="80" rows="10" id="ppost"></textarea>
	  </p>
	  <p>
	    <input type="submit" name="Submit" id="post" value="Forward" />
	  </p>
    </form>
  </div>
</div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
