<?php
session_start();
session_destroy();
session_start();
setcookie("email", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");

 
header('location:login.php');
?>