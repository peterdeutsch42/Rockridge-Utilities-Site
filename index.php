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
$con = mysql_connect("localhost","remote","remotepass");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rrutil", $con);
?>
</div>
</body>
</html>
