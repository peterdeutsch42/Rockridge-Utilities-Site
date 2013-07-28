<?php
$redirectchoice = $_POST['redirect'];
$rememberchoice = $_POST['remember'];
echo $rememberchoice;
echo $redirectchoice;

if ($rememberchoice = 'yes'){
$expire=time()+60*60*24*30;
setcookie("setpreference", "yes", $expire);
if ($redirectchoice == 'go'){
header("Location: http://www.sd45.bc.ca/rockridge");
setcookie("alwaysredirect", "true", $expire);
exit;
}
if ($redirectchoice == 'stay'){
header("Location: /Rockridge-Utilities-Site/index.php");
exit;
}
}
else {
if ($redirectchoice == 'go'){
header("Location: http://www.sd45.bc.ca/rockridge");
echo('<script> document.cookie = "setpreference=yes; expires=0; path=/";</script>');
exit;
}
else {
header("Location: /Rockridge-Utilities-Site/index.php");
echo('<script> document.cookie = "setpreference=yes; expires=0; path=/";</script>');
exit;
}
}
?>