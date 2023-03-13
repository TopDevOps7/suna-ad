<?php 

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$lang = "en";
if(isset($_SESSION['lang'])){
  $lang = $_SESSION['lang'];
} else $_SESSION['lang'] = "en";
require_once("$lang.php");

?>