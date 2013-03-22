<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
Send an email to my teachers who have me in
<form>
<form action="processmail.php" method="POST" />
Day: <input type="radio" name="day" value="1">1<input type="radio" name="day" value="2">2
<br />
Block: <input type="checkbox" name="block" value="1">1<input type="checkbox" name="block" value="2">2<input type="checkbox" name="block" value="3">3<input type="checkbox" name="block" value="4">4</input>
<br />I will be away on<br />
<input type="text" name="date">
<br />because<br />
<input type="text" name="reason">
<br />
Do you have any special message?<br />
<input type="text" name="message">
<input type="submit" />
</form>

