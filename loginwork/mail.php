<?php
 $to = "peterdeutsch@mailinator.com";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 echo $to;
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }
 ?>