<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<img src="images/rockridge.png" />
<div align="center">
<b><h1>IMPORTANT NOTICE:</h1><h3>Passwords are not being hashed at this time, and thus can be intercepted. Please do not use your regular password at this time</h3></b>
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$date = date("Y-m-d");
echo $date;
$result = mysql_query("SELECT * FROM `blockrotation` WHERE `Date` = '$date'");
$row = mysql_fetch_array($result);
echo "<br />";
$day = $row['Day'];
if (empty($day)) {
echo "There is no school today";
}
else {
echo "Day $day";
echo "<br />";
echo $row['Rotation'];
$xblock = $row['xblock'];
echo "<br />";
if ($xblock = '0')
	{
	echo "There is no X-Block today";
	}
	else
	{
	echo "There is X-Block today";
	}
}
echo "<br />";
$email = $_SESSION['email'];
if (empty($email)) {
echo "You are not logged in. <a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
}
else {
echo "Welcome back $email !";
echo "<br />";
echo "<a href='logout.php'>Logout</a>";

}
?>
<br />


</div>
</body>
</html>
