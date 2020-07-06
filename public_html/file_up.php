<?php 
session_start();
 $_SESSION['timezone']=$_POST['timezone']; 
    $_SESSION['width']=$_POST['width'];
    $_SESSION['height']=$_POST['height'];
      include_once("../country.php");
   include_once("../device.php");
   include_once("../browser.php");
   include_once("../user_country.php");
    if ($_POST['source']=="") {
    $_SESSION['source']="direct_entry"; 
      include_once("../source.php");
    }
    else{
    	   if ((explode("/", $_POST['source'])[2])!="you13.com") {
         $_SESSION['source']=explode("/", $_POST['source'])[2];
         include_once("../source.php");
       }
    }
?>
