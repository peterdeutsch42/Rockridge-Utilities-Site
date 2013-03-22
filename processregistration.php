<html>
<head>
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
<title>Rockridge Utilities Pre-Alpha</title>
</head>
<body>
<?php
mysql_connect('localhost','root','');
mysql_select_db("rrutil");
$Email = $_POST['email'];
$Email1 = "@";
$Email_Check = strpos($Email,$Email1);
$Password = $_POST['password'];
$Re_Password = $_POST['re-password'];
$Grade = $_POST['grade'];
$FullName = $_POST['fullname'];
if($Grade == "")
{
die("You don't enter your grade!");
}
if($FullName == "")
{
die("You don't enter your name!");
}
if($Password == "" || $Re_Password == "")
{
die("You didn't didn't correctly enter in one of the password fields!");
}

if($Password != $Re_Password)
{
die("Your passwords don't match! Try again.");
}

if($Email_Check === false)
{
die("That's not an email!");
}

//STEP 4 Insert Information Into MySQL Database

if(!mysql_query("INSERT INTO userinfo (grade, fullname, password, email)
VALUES ('$Grade', '$FullName', '$Password', '$Email')"))
{
die("We could not register you due to a mysql error (Contact the website owner if this continues to happen.)");
}
echo "Thank you, you have now registered. You may now log in.";

?>
<meta http-equiv="REFRESH" content="3;url=index.php">