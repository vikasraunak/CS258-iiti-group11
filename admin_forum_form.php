
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Public Post</title>
<link href="css/forum_form.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#subForm {
	font-size: .8em;
}
#subForm .label {
	float: left;
	width: 230px;
	margin-right: 10px;
	text-align: right;
	font-weight: bold;
	clear: left;
}

#post {
	margin-left: 240px;
	background-color: #CBD893;
	font-family: "Century Gothic", "Gill Sans", Arial, sans-serif;
}

#refer {
	font-family: "Century Gothic", "Gill Sans", Arial, sans-serif;
}

#name, #roll, #ppost,#prof,#title {
	background-color: #FBEF99;
	font-family:"Lucida Console", Monaco, monospace;
	font-size: .9em;
	width: 300px;
	margin-top: -2px;
}

#name:focus,
#username:focus,
#ppost:focus,
#prof:focus
{
	background-color: #FDD041;
}

</style>
</head>
<body id="feature" class="col2">
<div id="wrapper">
  <div id="banner">
    <div id="background"><p class="logo">IITI Alumni Forum : Public</p>
      <div id="nav">
        <ul>
          <li><a href="admin_forum_guide.php" id="guide">How this Works</a></li>
	<br class="clear"  />
      </div>
      <!-- end nav -->
    </div>
    <!-- end background -->
  </div>
  <!-- end banner -->
  <div id="main">
    <h1 id="lead"><span class="section">Create Post In</span> Public Forum </h1>
    <form action="admin_public_forum_action.php" id="subForm" name="subForm" method="post" >
    <p><label for="name" class="label">What is your name?</label>
      <input type="text" name="name" id="name" /></p>
<p><label for="roll" class="label">What is your username ( will not appear in post )?</label>
      <input type="text" name="roll" id="roll" /></p>
	  <p><label for="prof" class="label">What is Your Current Profession?</label>
      <input type="text" name="prof" id="prof" /></p>

 <p><label for="title" class="label">What is the Post Title ?</label>
      <input type="text" name="title" id="title" /></p>


	  <p>
	    <span class="label">Who is this Post Aimed at ?</span>
	    <label>
	    <input name="aud" type="radio" value="1" />Anybody</label>
	    <label>
	    <input name="aud" type="radio" value="2" />For Institute</label>
	    <label>
	    <input name="aud" type="radio" value="3" />For Students</label>
	  </p>
	  <p>
	    <label for="refer" class="label">What is this Post About ?</label>
	    <select name="refer" id="refer">
	      <option value="null">Select One</option>
	      <option value="1">Academics</option>
	      <option value="2">Professional Opportunities</option>
	      <option value="3">Institute Experience/Events</option>
	      <option value="4">General</option>
        </select>
	  </p>
	  <p>
	    <label for="ppost" class="label"> The Main Post </label>
        <textarea name="ppost" cols="35" rows="4" id="ppost"></textarea>
	  </p>
	  <p>
	    <input type="submit" name="Submit" id="post" value="Forward" />
	  </p>
    </form>
	<br class="clear" />
  </div>
</div>
<!-- end wrapper -->
</body>
</html>
