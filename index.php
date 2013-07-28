<?php header('Content-type: text/html; charset=utf-8'); ?>
<DOCTYPE html>
<html>
<head>
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
<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
<script>
function getStylesheet() {
      var currentTime = new Date().getHours();
      if (0 <= currentTime&&currentTime < 16) {
       document.write("<link rel='stylesheet' href='css/mainstyle.css' type='text/css'>");
      }

      if (16 <= currentTime&&currentTime <= 24) {
       document.write("<link rel='stylesheet' href='css/mainstylenight.css' type='text/css'>");
      }

}

getStylesheet();
</script>
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
		maxHeight	: 400,
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
	$("#redirectprompt").fancybox({
		maxWidth	: 800,
		maxHeight	: 250,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		type: 'iframe',
	});
});
</script>
<script>
function redirect(){
if (document.cookie.indexOf("setpreference") == -1) {
alert(document.cookie.indexOf("setpreference"));
$('#redirectprompt').trigger('click');}
}
</script>
</head>
<body onload="redirect();">
<div id="container">
<img id="crest" src="images/crest.gif" />
<?php
if ($_COOKIE["alwaysredirect"] == 'true'){
header("Location: http://sd45.bc.ca");
}
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
if (date('H') < 15) {
$date = date("Y-m-d");
$tomorrow = 'false';
}
if (date('H') >= 15) {
$date = date("Y-m-d", strtotime("tomorrow"));
$tomorrow = 'true';
}
$result = mysql_query("SELECT * FROM `blockrotation` WHERE `Date` = '$date'");
$row = mysql_fetch_array($result);
$day = $row['Day'];
$block = $row['Rotation'];


echo "<br />";
$email = @$_SESSION['email'];
if (empty($email)) {

$xblock = $row['xblock'];
echo "<br />";
if (empty($day) AND empty($block)){
if ($tomorrow == 'true'){
echo "<p id='noschool'>There is no school tomorrow</p>";
}
if ($tomorrow == 'false'){
echo "<p id='noschool'>There is no school today</p>";
}
	echo "<br />";
	echo "<br />";
	echo "You are not logged in. <a class='various fancybox.iframe' href='login.php'>Login</a> or <a class='various fancybox.iframe' href='register.php'>Register</a>";
$tabs1 = file_get_contents('loggedouttabs.html');
echo $tabs1;
}
else{
if ($tomorrow == 'false'){
echo "<b><h3>Today's block rotation is is:</h3></b>";
echo "<h2>Day $day</h2>";
echo "<h1>$block</h1>";

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
	}
if ($tomorrow == 'true'){
echo "<b><h3>Tomorrow's block rotation will be</h3></b>";
echo "<h2>Day $day</h2>";
echo "<h1>$block</h1>";

if ($xblock == '1')
	{
	echo "There will be X-Block tomorrow";
	}
	else
	{
	echo "There will be no X-Block tomorrow";
	}
	echo "<br />";
	echo "<br />";
	}
}
}
else {
$tabs2 = file_get_contents('loggedintabs.html');
echo $tabs2;
$blockrotations = mysql_query("SELECT * FROM `userinfo` WHERE `email` = '$email'");
$blockrotationsrow = mysql_fetch_array($blockrotations);
$name = $blockrotationsrow['fullname'];
$_SESSION['fullname'] = $name;
echo "<p id='welcome'>Welcome back $name!</p>";
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
if ($tomorrow == 'true'){
echo "<p id='noschool'>There is no school tomorrow</p>";
}
if ($tomorrow == 'false'){
echo "<p id='noschool'>There is no school today</p>";
}
}
else {
echo "<b>Your Block Rotation Today:</b>";
echo "<br /><br />";
echo "Day $day";
echo "<br />";
$chars = preg_split('//', $block, -1, PREG_SPLIT_NO_EMPTY);
if ($day == '1')
{
if ($block == '1234'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block11</td><td>$block12</td><td>$block13</td><td>$block14</td></tr></table>";
}
if ($block == '2314'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block12</td><td>$block13</td><td>$block11</td><td>$block14</td></tr></table>";
}
if ($block == '3124'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block13</td><td>$block11</td><td>$block12</td><td>$block14</td></tr></table>";
}
}
else
{
if ($block == '1234'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block21</td><td>$block22</td><td>$block23</td><td>$block24</td></tr></table>";
}
if ($block == '2314'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block22</td><td>$block23</td><td>$block21</td><td>$block24</td></tr></table>";
}
if ($block == '3124'){
echo "<table border='1'><tr><td>$chars[0]</td><td>$chars[1]</td><td>$chars[2]</td><td>$chars[3]</td></tr><tr><td>$block23</td><td>$block21</td><td>$block22</td><td>$block24</td></tr></table>";
}}
$xblock = $row['xblock'];
if ($xblock == '1')
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
<!--
<div id="leftfloat">
<img id="logo" src="images/rockridge.png" alt="Rockridge Logo" />
</div>-->
</body>
</html>