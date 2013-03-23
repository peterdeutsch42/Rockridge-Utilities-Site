<?PHP
session_start();
define('GUSER', 'rockridgeutilities@gmail.com');
define('GPWD', 'rockridgeravens');
require("phpmailer/class.phpmailer.php");

mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$Email = $_SESSION['email'];
$DaysAway = $_POST['day'];
$BlocksAway = $_POST['block'];
$Date = $_POST['date'];
$Reason = $_POST['reason'];
$Message = $_POST['message'];
$FullName = $_SESSION['fullname'];
$blockrotations = mysql_query("SELECT * FROM `userinfo` WHERE `email` = '$Email'");
$blockrotationsrow = mysql_fetch_array($blockrotations);
$block11 = $blockrotationsrow['block11course'];
$block12 = $blockrotationsrow['block12course'];
$block13 = $blockrotationsrow['block13course'];
$block14 = $blockrotationsrow['block14course'];
$block21 = $blockrotationsrow['block21course'];
$block22 = $blockrotationsrow['block22course'];
$block23 = $blockrotationsrow['block23course'];
$block24 = $blockrotationsrow['block24course'];
$block11teacher = $blockrotationsrow['block11teacher'];
$block12teacher = $blockrotationsrow['block12teacher'];
$block13teacher = $blockrotationsrow['block13teacher'];
$block14teacher = $blockrotationsrow['block14teacher'];
$block21teacher = $blockrotationsrow['block21teacher'];
$block22teacher = $blockrotationsrow['block22teacher'];
$block23teacher = $blockrotationsrow['block23teacher'];
$block24teacher = $blockrotationsrow['block24teacher'];
function smtpmailer($to, $from, $from_name, $subject, $DaysAwayFormatted, $BlocksAwayFormatted, $ClassAway, $Date, $Reason, $Message) { 
	$FullName = $_SESSION['fullname'];
	global $error;
	$mail = new PHPMailer();  // create a new object
	if (empty($Message)){
	$body = file_get_contents('emailtemplate.html');
	$body = str_replace('[FullName]', $FullName, $body);
	$body = str_replace('[DaysAway]', $DaysAwayFormatted, $body);
	$body = str_replace('[BlocksAway]', $BlocksAwayFormatted, $body);
	$body = str_replace('[ClassAway]', $ClassAway, $body);
	$body = str_replace('[Date]', $Date, $body);
	$body = str_replace('[Reason]', $Reason, $body);
	}
	else {
	$body = file_get_contents('emailtemplatespecial.html');
	$body = str_replace('[FullName]', $FullName, $body);
	$body = str_replace('[DaysAway]', $DaysAwayFormatted, $body);
	$body = str_replace('[BlocksAway]', $BlocksAwayFormatted, $body);
	$body = str_replace('[ClassAway]', $ClassAway, $body);
	$body = str_replace('[Date]', $Date, $body);
	$body = str_replace('[Reason]', $Reason, $body);
	$body = str_replace('[Message]', $Message, $body);
	}
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
	echo $DaysAway;
if ($DaysAway == 'day1'){
echo ('You will be away Day 1');
if ($BlocksAway[0] == 'block1' || $BlocksAway[1] == 'block1' || $BlocksAway[2] == 'block1' || $BlocksAway[3] == 'block1'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block11teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 1';
$BlocksAwayFormatted = 'Block 1';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block11, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block2' || $BlocksAway[1] == 'block2' || $BlocksAway[2] == 'block2' || $BlocksAway[3] == 'block2'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block12teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 1';
$BlocksAwayFormatted = 'Block 2';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block12, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block3' || $BlocksAway[1] == 'block3' || $BlocksAway[2] == 'block3' || $BlocksAway[3] == 'block3'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block13teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 1';
$BlocksAwayFormatted = 'Block 3';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block13, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block4' || $BlocksAway[1] == 'block4' || $BlocksAway[2] == 'block4' || $BlocksAway[3] == 'block4'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block14teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 1';
$BlocksAwayFormatted = 'Block 4';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block14, $Date, $Reason, $Message);
}
}
else{
echo ('You will be away Day 2');
if ($BlocksAway[0] == 'block1' || $BlocksAway[1] == 'block1' || $BlocksAway[2] == 'block1' || $BlocksAway[3] == 'block1'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block21teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 2';
$BlocksAwayFormatted = 'Block 1';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block21, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block2' || $BlocksAway[1] == 'block2' || $BlocksAway[2] == 'block2' || $BlocksAway[3] == 'block2'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block22teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 2';
$BlocksAwayFormatted = 'Block 2';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block22, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block3' || $BlocksAway[1] == 'block3' || $BlocksAway[2] == 'block3' || $BlocksAway[3] == 'block3'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block23teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 2';
$BlocksAwayFormatted = 'Block 3';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block23, $Date, $Reason, $Message);
}
if ($BlocksAway[0] == 'block4' || $BlocksAway[1] == 'block4' || $BlocksAway[2] == 'block4' || $BlocksAway[3] == 'block4'){
$teacheremailrow = mysql_query("SELECT * FROM `teacherinfo` WHERE `name` = '$block24teacher'");
$teacheremail =  mysql_fetch_row($teacheremailrow); 
$teacheremail = $teacheremail[1];
echo $teacheremail;
$DaysAwayFormatted = 'Day 2';
$BlocksAwayFormatted = 'Block 4';
smtpmailer($teacheremail, 'rockridgeutilities@gmail.com', 'Rockridge Automated Absence Service', 'Sample Subject', $DaysAwayFormatted, $BlocksAwayFormatted, $block24, $Date, $Reason, $Message);
}
}
?>