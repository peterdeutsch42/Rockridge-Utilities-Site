<?php
require("phpmailer/class.phpmailer.php");
define('GUSER', 'rockridgeutilities@gmail.com');
define('GPWD', 'rockridgeravens');
function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo;
echo $error;		
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
	}
	smtpmailer('peterdeutsch42@gmail.com', '', 'rockridgeutilities@gmail.com', 'Site Admin', 'Testytesttest', 'Hello World!');
?>
