<?php

$doc='request for documents';
$accom='request for accomodation';

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Send request to institute</title>
<link href="project/_css/site.css" rel="stylesheet">
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
<script src="project/_js/jquery-1.7.2.min.js"></script>
<script src="project/_js/jquery.validate.min.js"></script>
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
  <h1>Send request to Institute</h1>
    <form action="send_request_exec.php" method="POST" name="pwdreset" id="pwdreset">
      <div>
        <label for="email" class="label">E-mail From</label>
        <input name="email" type="text" id="email" autofocus required>
      </div>
      <div>
        <label for="email" class="label">E-mail to</label>
        <input name="emailto" type="text" id="emailto">
      </div>
                                                           <div>
        <label for="reason" class="label">Reason </label>
        <select name="reason" id="programme" value="reason" class="required" title="Please choose a reason.">
          <option value="one">--Please select one--</option>
          <option value="acc">request for accomodation</option>
          <option value="doc">request for documents</option>
          <option value="non">none of the above</option>
        </select>
      </div>
      <div>
        <label for="sub" class="label">Subject</label>
        <input type="text" name="sub" title="Write your request" placeholder="Subject here">
      </div>
      <div>
        <label for="msg" class="label">Body</label>
        <textarea name="msg" rows="10" cols="50" title="Write your request" placeholder="body"></textarea>
      </div>
      
      
    
      <div>
        <input type="submit" name="submit" id="submit" value="Submit">
      </div>
    </form>
    </div>
  </div>
</div>
</body>
</html>
