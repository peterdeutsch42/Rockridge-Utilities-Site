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
$result = mysql_query("SELECT * FROM `blockrotation` WHERE `Date` = '$date'");
$row = mysql_fetch_array($result);
$day = $row['Day'];
$block = $row['Rotation'];


echo "<br />";
$email = @$_SESSION['email'];
if (empty($email)) {

echo "<b>Today is:</b><br />";
echo "Day $day";
echo "<br />";
echo $block;
$xblock = $row['xblock'];
echo "<br />";
if ($xblock == '1')
	{
	echo "There is X-Block today";
	}
	else
	{
	echo "There is no X-Block today";
	}
	echo "<br />";
	echo "<br />";
	echo "You are not logged in. <a href='login.php'>Login</a> or <a href='register.php'>Register</a>";
}
else {
$blockrotations = mysql_query("SELECT * FROM `userinfo` WHERE `email` = '$email'");
$blockrotationsrow = mysql_fetch_array($blockrotations);
$name = $blockrotationsrow['fullname'];
echo "Welcome back $name!";
echo "<br />";


$block11 = $blockrotationsrow['block11course'];
$block12 = $blockrotationsrow['block12course'];
$block13 = $blockrotationsrow['block13course'];
$block14 = $blockrotationsrow['block14course'];
$block21 = $blockrotationsrow['block21course'];
$block22 = $blockrotationsrow['block22course'];
$block23 = $blockrotationsrow['block23course'];
$block24 = $blockrotationsrow['block24course'];
if (empty($block11)) {
$block11 = 'None Entered';
}
if (empty($block12)) {
$block12 = 'None Entered';
}
if (empty($block13)) {
$block13 = 'None Entered';
}
if (empty($block14)) {
$block14 = 'None Entered';
}
if (empty($block21)) {
$block21 = 'None Entered';
}
if (empty($block22)) {
$block22 = 'None Entered';
}
if (empty($block23)) {
$block23 = 'None Entered';
}
if (empty($block24)) {
$block24 = 'None Entered';
}

if (empty($day) AND empty($block)){
echo "There is no school today";
}
else {
echo "<b>Your Block Rotation Today:</b>";
echo "<br /><br />";
echo "Day $day";
$chars = preg_split('//', $block, -1, PREG_SPLIT_NO_EMPTY);
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block11</td><td>$block12</td><td>$block13</td><td>$block14</td></tr></table>";
if ($xblock = 1)
	{
	echo "There is X-Block today";
	}
	else
	{
	echo "There is no X-Block today";
	}
}
echo "<br /><a href='addblockrotation.php'>Add Blocks</a><br />";
echo "<a href='logout.php'>Logout</a>";
}
?>
<br />


</div>
</body>
</html>