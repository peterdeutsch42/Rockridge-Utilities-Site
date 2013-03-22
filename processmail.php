<?PHP
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$_SESSION['email'] = $Email
$DaysAway = $_POST['day'];
$BlocksAway = $_POST['block'];
$Date = $_POST['date'];
$Reason = $_POST['reason'];
$Message = $_POST['message'];
echo $DaysAway;
echo $BlocksAway;
echo $Date;
echo $Reason;
echo $Message;
?>