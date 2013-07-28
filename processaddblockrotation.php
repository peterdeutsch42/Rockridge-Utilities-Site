<html>
<head>
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
$Teacher = $_POST['teacher'];
$Email = $_SESSION['email'];
if ($Day == '1' AND $Block == '1') {
mysql_query("UPDATE userinfo
SET block11course='$Class', block11teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '1' AND $Block == '2') {
mysql_query("UPDATE userinfo
SET block12course='$Class',  block12teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '1' AND $Block == '3') {
mysql_query("UPDATE userinfo
SET block13course='$Class', block13teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '1' AND $Block == '4') {
mysql_query("UPDATE userinfo
SET block14course='$Class', block14teacher='$Teacher'
WHERE email='$Email'");
echo "$Class$Teacher Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '2' AND $Block == '1') {
mysql_query("UPDATE userinfo
SET block21course='$Class', block21teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '2' AND $Block == '2') {
mysql_query("UPDATE userinfo
SET block22course='$Class', block22teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
if ($Day == '2' AND $Block == '3') {
mysql_query("UPDATE userinfo
SET block23course='$Class', block23teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. ";
die();
}
if ($Day == '2' AND $Block == '4') {
mysql_query("UPDATE userinfo
SET block24course='$Class', block24teacher='$Teacher'
WHERE email='$Email'");
echo "Your class has been updated. Would you like to <a href='addblockrotation.php'>Add Another?</a>";
die();
}
else {
echo "OH POOP YOU BROKE THE SYSTEM";
}
?>
