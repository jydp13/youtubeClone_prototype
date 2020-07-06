<?php
session_start();
$_SESSION['time']=$_POST['localtime'];
$_SESSION['w']=$_POST['width'];
$_SESSION['h']=$_POST['height'];
header('Location: http://you13.com');
?>
