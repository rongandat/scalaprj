<?php
require_once( '../../../../wp-load.php' );

	//Change the #emailTo to your email address
	$emailTo = of_get_option('ctemplate_email');
	$subject = $_REQUEST['subject'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$msg=$_REQUEST['msg'];
	
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: ".$name." <".$email.">";
	$headers[] = "Reply-To: ".$name." <".$email.">";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/".phpversion();
	
	$body = "Name: $name \r\nEmail: $email \r\nMessage: $msg";
	
	$sendmail=wp_mail($emailTo, $subject, $body, implode("\r\n", $headers));
	
	if ($sendmail) echo "OK";
?>