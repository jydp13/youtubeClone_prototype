<?php
session_start();
 if ($_POST['source']=="") {
    $_SESSION['source']="direct_entry"; 
    	 include_once("../source.php");	
    }
    else {
    	 if ((explode("/", $_POST['source'])[2])!="you13.com") {
    	 $_SESSION['source']=explode("/", $_POST['source'])[2];
    	  include_once("../source.php");
    	 }
    		
    }


?>