<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Password Reset Form</title>
<link href="css/admin_css/site.css" rel="stylesheet">
<style>

#pwdreset label.error {
  font-size: 0.8em;
  color: #F00;
  font-weight: bold;
  display: block;
  margin-left: 215px;
}
#pwdreset  input.error, #pwdreset select.error  {
  background: #FFA9B8;
  border: 1px solid red;
}
</style>
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script src="js/admin_js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
 $('#pwdreset').validate({
   
   rules: {
     mail: {
        required: true,
        email: true
     },
batch: {
        required: true,
        batch:true 
     },
dob: {
        required: true,
        dob : true 
     },
branch: {
        required: true,
        branch: true 
     }, 
     roll: {
        required: true,
        rangelength:[5,16]
     },
     spam: "required"
   }, //end rules
   messages: {
      mail: {
         required: "Please supply an e-mail address.",
         email: "This is not a valid email address."
       },
 batch: {
         required: "Please Enter your batch's year.",
         batch:  "Enter the Year" 
       },
 branch: {
         required: "Please Enter your branch of study.",
         branch:  "Enter your stream"
       },
      roll: {
        required: 'Please Enter your Roll Number',
      },
     
   },
   errorPlacement: function(error, element) { 
       if ( element.is(":radio") || element.is(":checkbox")) {
          error.appendTo( element.parent()); 
        } else {
          error.insertAfter(element);
        } 
    } 

  }); // end validate 
}); // end ready
</script>

</head>
<body>
<div class="wrapper">
	<div class="header">
		<p class="logo"> IIT <i> </i> Indore <i class="mm">IITI<br>
			Alumni<br>
			Network</i></p>
	</div>
	<div class="content">
	<div class="main">
	<h1>Password Reset Form</h1>
		<form action="admin_pwd_reset_forgot_email_process.php" method="post" name="pwdreset" id="pwdreset" enctype="multipart/form-data">
			<div style="position: relative; left: 70px;">
      <div>
        <label for="branch" class="label">Branch</label>
        <input name="branch" type="text" id="branch" placeholder="me">
      </div>
                                                     <div>
        <label for="roll" class="label">Roll Number</label>
        <input name="roll" type="text" id="roll" placeholder="me1100155">
      </div>
				<label for="mail" class="label">New E-mail Address</label>
				<input name="mail" type="text" id="mail" placeholder="someone@email.com">
			</div>
			<br>
			<div style="position: relative; left: 60px;">
				<h5><p>Upload Your any appropriate proof's photo (Must be an image).</p></h5>
			</div>
			<div style="position: relative; left: 160px;" >
				<input type="file" size="40" name="userFile"/>
			</div>

			<br>
			<div>
				<input type="submit" name="submit" id="submit" value="Submit">
			</div>
		</form>
		</div>
	</div>
</div>
</body>
</html>


