<?php
  $email = $_POST['email'];
  $to        = "admin@suna.ai";
  $subject   = "[Get in Touch ] $email";
  $subject   = "=?UTF-8?B?".base64_encode($subject)."?=";
  $header    = 
      'MIME-Version: 1.0' . "\r\n".
      'Content-type: text/html; charset=UTF-8' . "\r\n" .
      'Content-Transfer-Encoding: 8bit' . "\r\n" .
      'From: ' . $email . "\r\n";

  $content   = 'New touch request from ' . $email . ' through Suna Comming Soon.';
  
  return mail($to, $subject, $content, $header);
?>