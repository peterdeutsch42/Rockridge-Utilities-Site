<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1d",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+2d",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</head>
<body>
<?php
session_start();
?>
<div align="center">
<h1>I will be away</h1><br /><b>
<form action="processmail.php" method="POST">
<label for="from">From</label>
<input type="text" id="from" name="from" />
<label for="to">to</label>

<input type="text" id="to" name="to" /><br /><br />
Blocks: </b><input type="checkbox" name="block[]" value="block1" checked>1<input type="checkbox" name="block[]" value="block2" checked>2<input type="checkbox" name="block[]" value="block3" checked>3<input type="checkbox" name="block[]" value="block4" checked>4</input>
<br /><br /><b>Because I am</b><br />(i.e. Sick, On a Field Trip, On Vacation)<br />
<input type="text" name="reason">
<br /><br />
<b>Do you have any special message?</b><br />(If not, leave field blank)<br />
<textarea name="message"></textarea>
<br />
<input type="submit" />
</form>
</div>
</body>
</html>

