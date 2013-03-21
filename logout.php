<?php
session_start();
session_destroy();
echo "You have been logged out. Redirecting to the main page.";
?>
<meta http-equiv="REFRESH" content="0;url=index.php">