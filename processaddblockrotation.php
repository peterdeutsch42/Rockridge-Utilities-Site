<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$Day = $_POST['day'];
$Block = $_POST['block'];
$Class = $_POST['classtype'];
$Email = $_SESSION['email'];
if ($Day == '1' AND $Block == '1') {
mysql_query("UPDATE userinfo
SET block11course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '1' AND $Block == '2') {
mysql_query("UPDATE userinfo
SET block12course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '1' AND $Block == '3') {
mysql_query("UPDATE userinfo
SET block13course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '1' AND $Block == '4') {
mysql_query("UPDATE userinfo
SET block14course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '2' AND $Block == '1') {
mysql_query("UPDATE userinfo
SET block21course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '2' AND $Block == '2') {
mysql_query("UPDATE userinfo
SET block22course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '2' AND $Block == '3') {
mysql_query("UPDATE userinfo
SET block23course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
if ($Day == '2' AND $Block == '4') {
mysql_query("UPDATE userinfo
SET block24course='$Class'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another</a> or <a href='index.php'>Go Back</a>?";
die();
}
else {
echo "OH POOP YOU BROKE THE SYSTEM";
}
?>
