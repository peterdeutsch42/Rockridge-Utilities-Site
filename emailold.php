<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
<script language="javascript" src="calendar/calendar.js"></script>
</head>
<body>
<?php
session_start();
?>
<div align="center">
<b>Send an email to my teachers who have me on</b>
<form action="processmail.php" method="POST" />
Day: <input type="radio" name="day" value="day1">1<input type="radio" name="day" value="day2">2
<br />
<b>During</b>
<br />
Block: <input type="checkbox" name="block[]" value="block1">1<input type="checkbox" name="block[]" value="block2">2<input type="checkbox" name="block[]" value="block3">3<input type="checkbox" name="block[]" value="block4">4</input>
<br /><b>I will be away</b><br />(i.e. Today, Tomorrow, On Thursday)<br />
<input type="text" name="date">
<br /><b>Because I am</b><br />(i.e. Sick, On a Field Trip, On Vacation)<br />
<input type="text" name="reason">
<br />
<b>Do you have any special message?</b><br />(If not, leave field blank)<br />
<textarea name="message"></textarea>
<br />
<input type="submit" />
</form>
</div>
</body>
</html>

