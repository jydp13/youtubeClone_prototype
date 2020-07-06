<?php
 //session_start();
 include_once('header.php');
 unset($_SESSION['emailid']);
 unset($_SESSION['login_info']);
 unset($_SESSION['refresh']);
 header("Location: http://localhost:2000?category=account");
?>
