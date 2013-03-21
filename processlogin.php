<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("rrutil");

$Email = $_POST['email'];
$Pass = $_POST['password'];
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

//STEP 4 Check Username And Password With The MySQL Database

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
die("Incorrect Username or Password!");
}

if($Email == $Database_Email && $Pass == $Database_Pass)
{
// If The User Makes It Here Then That Means He Logged In Successfully
echo "Hello " . $_SESSION['email'] . "!";
}

?>
<html>
<body>
<meta http-equiv="REFRESH" content="0;url=index.php"></HEAD>
</body>
</html>