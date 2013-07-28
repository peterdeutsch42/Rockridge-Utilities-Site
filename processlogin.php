<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");

$Email = $_POST['email'];
$Passprehash = $_POST['password'];
$Pass = hash('sha1', $Passprehash);
$Query = mysql_query("SELECT * FROM userinfo WHERE email='$Email' AND password='$Pass'");
$NumRows = mysql_num_rows($Query);
$_SESSION['email'] = $Email;
$_SESSION['password'] = $Pass;
if(empty($_SESSION['email']) || empty($_SESSION['password']))
{
die("Go back and login before you visit this page!");
}

if($Email && $Pass == "")
{
die("Please enter in a name and password!");
}

if($Email == "")
{
die("Please enter your name!" . "</br>");
}

if($Pass == "")
{
die("Please enter a password!");
echo "</br>";
}


if($NumRows != 0)
{
while($Row = mysql_fetch_assoc($Query))
{
$Database_Email = $Row['email'];
$Database_Pass = $Row['password'];
}
}
else
{
unset ($_SESSION['email']);
unset ($_SESSION['password']);
unset ($Pass);
unset ($Email);
die("Incorrect Username or Password!");
}

if($Email == $Database_Email && $Pass == $Database_Pass)
{
echo "<div align='center' style='top:50%;'><h3 align='center'>Hello</h3>";
echo "<h1 align='center'>";
echo $_SESSION['email'];
echo "</h1></div>";
echo "<script>function redirect(){window.top.location.href = '/Rockridge-Utilities-Site/index.php';}</script>";
echo "<script> setTimeout('redirect();', 3000)</script>";
}

?>
<html>
<body>

</body>
</html>