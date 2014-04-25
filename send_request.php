<?php
require('auth.php');
$doc='request for documents';
$accom='request for accomodation';

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <!--LINK CSS FILES-->
  <link rel="stylesheet" type="text/css" href="css/general.css"> 
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <title>Request to Institute</title>
<script src="js/admin_js/jquery-1.7.2.min.js"></script>
<script src="js/admin_js/jquery.validate.min.js"></script>

<script>
$(document).ready(function() {
 $('#pwdreset').validate({
   
   rules: {
     email: {
        required: true,
        email: true
     },
     emailto: {
        required: true,
        email: true
     },
     spam: "required"
   }, //end rules


   messages: {
      email: {
         required: "Please supply an e-mail address.",
         email: "This is not a valid email address."
       },
      emailto: {
         required: "Please supply an e-mail address.",
         email: "This is not a valid email address."
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
}); // end ready</script>

</head>

<body>
<?php require('navbar.php'); ?>
<div class="container">
  <div class="col-md-6 col-md-offset-3">
  <div class="well">
  <h1>Send request to Institute</h1>
    <form action="send_request_exec.php" method="POST" name="pwdreset" id="pwdreset">
      <div>
        <label for="email" >E-mail From</label>
        <input name="email" type="text" id="email" autofocus required>
      </div>
      <div>
        <label for="email" >E-mail to</label>
        <input name="emailto" type="text" id="emailto" value='palaniia@iiti.ac.in'>
      </div>
                                                           <div>
        <label for="reason" >Reason </label>
        <select name="reason" id="programme" value="reason" class="required" title="Please choose a reason.">
          <option value="one">--Please select one--</option>
          <option value="acc">request for accomodation</option>
          <option value="doc">request for documents</option>
          <option value="non">none of the above</option>
        </select>
      </div>
      <div>
        <label for="sub" >Subject</label>
        <input type="text" name="sub" title="Write your request" placeholder="Subject here">
      </div>
      <div>
        <label for="msg" >Body</label><br>
        <textarea name="msg" rows="10" cols="50" title="Write your request" placeholder="body"></textarea>
      </div>
      
      
    
      <div>
        <input type="submit" name="submit" id="submit" value="Submit">
      </div>
    </form>
    </div>
  </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
