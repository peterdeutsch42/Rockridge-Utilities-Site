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
<form target="_top" action="processredirect.php" method="POST">
<input type="radio" name="redirect" value="stay">Stay at RockridgeSecondary.ca<br />
<input type="radio" name="redirect" value="go">Go to Rockridge Secondary's homepage<br />
<input type="checkbox" name="remember" value="yes">Remember this choice
<input type="submit" />
</form>
</body>