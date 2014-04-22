<?php
$s=mail('kartikeya.cool@gmail.com', 'Test Mail', 'This mail is sent from localhost', 'From: yoda@gmail.com');

if($s==1)
	echo 'mail sent';
else
	echo 'failed';
?>