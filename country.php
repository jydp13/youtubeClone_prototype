<?php
 session_start();
  if(preg_match('/IST/i',$_SESSION['timezone']) || preg_match('/GMT/i',$_SESSION['timezone']) || preg_match('/0530/i',$_SESSION['timezone'])){
  	    $_SESSION['country']="India";
     }
     else{
        $_SESSION['country']="unknown";
     }
?>