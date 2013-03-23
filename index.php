<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 250,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		afterClose : function() {
        location.reload();
        return;
    }
	});
});
$(document).ready(function() {
	$(".bigger").fancybox({
		maxWidth	: 800,
		maxHeight	: 350,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		afterClose : function() {
        location.reload();
        return;
    }
	});
});
</script>
</head>
<body>
<img src="images/rockridge.png" alt="Rockridge Logo" />
<div align="center">
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$date = date("Y-m-d");
echo $date;
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
	echo "You are not logged in. <a class='various fancybox.iframe' href='login.php'>Login</a> or <a class='various fancybox.iframe' href='register.php'>Register</a>";
}
else {
$blockrotations = mysql_query("SELECT * FROM `userinfo` WHERE `email` = '$email'");
$blockrotationsrow = mysql_fetch_array($blockrotations);
$name = $blockrotationsrow['fullname'];
$_SESSION['fullname'] = $name;
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
echo "<br />";
$chars = preg_split('//', $block, -1, PREG_SPLIT_NO_EMPTY);
if ($day == '1')
{
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block11</td><td>$block12</td><td>$block13</td><td>$block14</td></tr></table>";
}
else
{
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block21</td><td>$block22</td><td>$block23</td><td>$block24</td></tr></table>";
}
if (@$xblock == '1')
	{
	echo "There is X-Block today";
	}
	else
	{
	echo "There is no X-Block today";
	}
echo "<br /><a class='various fancybox.iframe' href='addblockrotation.php'>Add Blocks</a><br />";
echo "<a class='bigger fancybox.iframe' href='email.php'>Email</a><br />";
echo "<a href='logout.php'>Logout</a>";
}
}
?>
<br />


</div>
</body>
</html>