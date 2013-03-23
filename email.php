<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<?php
session_start();
?>
<div align="center">
Send an email to my teachers who have me om
<form action="processmail.php" method="POST" />
Day: <input type="radio" name="day" value="day1">1<input type="radio" name="day" value="day2">2
<br />
During
<br />
Block: <input type="checkbox" name="block[]" value="block1">1<input type="checkbox" name="block[]" value="block2">2<input type="checkbox" name="block[]" value="block3">3<input type="checkbox" name="block[]" value="block4">4</input>
<br />I will be away on<br />
<input type="text" name="date">
<br />because<br />
<input type="text" name="reason">
<br />
Do you have any special message?<br />
<input type="text" name="message">
<br />
<input type="submit" />
</form>
</div>
</body>
</html>

