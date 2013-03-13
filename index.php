<html>
<head>
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<p align="center">
This is a test site
</p>
<div align="center">
<p>Dummy Table</p>
<table>
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
</tr>
</table>
<p>PHP dohicky</p>
<?php
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$date = date("Y-m-d");
echo $date;
$result = mysql_query("SELECT * FROM `blockrotation` WHERE `Date` = '$date'");
$row = mysql_fetch_array($result);
echo $row['Rotation'];
$xblock = $row['xblock'];
echo $xblock;

?>
</div>
</body>
</html>
