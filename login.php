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
<div align="center">
<h1>Login</h1>
<form action="processlogin.php" method="POST" />
<label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="email"/></br>
<label>Password: </label><input type="password" name="password"/></br><br />
<input type="submit" />
</form>
</div>
</body>
</html>