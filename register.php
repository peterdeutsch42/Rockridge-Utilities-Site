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
</head>
<body>
<div align="center">
<h1>Register</h1>
<form action="processregistration.php" method="POST">
Full Name: <input type="text" name="fullname" /></br>
Grade: <input type="text" name="grade" /></br>
Email: <input type="text" name="email" /></br>
Password: <input type="password" name="password" /></br>
Re-type Password: <input type="password" name="re-password" /></br>
<input type="submit" />
</form>
</div>
</body>
</html>