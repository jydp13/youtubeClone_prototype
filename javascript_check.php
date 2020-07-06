<?php

if(!isset($_SESSION['js'])||$_SESSION['js']==""){
  echo "<noscript><meta http-equiv='refresh' content='0;url=/get-javascript-status.php&js=0'> </noscript>";
   $js = true;

 }elseif(isset($_SESSION['js'])&& $_SESSION['js']=="0"){
   $js = false;
   $_SESSION['js']="";

 }elseif(isset($_SESSION['js'])&& $_SESSION['js']=="1"){
   $js = true;
   $_SESSION['js']="";
}

if ($js) {
    echo 'Javascript is enabled';
 } else {
    echo 'Javascript is disabled';
}

?>