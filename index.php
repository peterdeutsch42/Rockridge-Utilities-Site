<html>
<head>
<style>
body {background-image:url('images/bg.jpg');}
img
{
position:absolute;
left:0px;
top:0px;
z-index:-1;
opacity: 0.5;
}
</style>
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<p align="center">
This is a test site
</p>
<img src="images/rockridge.png" />
<div align="center">
<p>PHP dohicky</p>
<?php
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$date = date("Y-m-d");
echo $date;
$result = mysql_query("SELECT * FROM `blockrotation` WHERE `Date` = '$date'");
$row = mysql_fetch_array($result);
echo "<br />";
$day = $row['Day'];
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

?>
</div>
</body>
</html>
