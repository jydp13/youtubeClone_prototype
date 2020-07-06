<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="1">
	<title></title>
</head>
<body>
 <p><?php 

    $status=$_SESSION['time']*$_SESSION['speed'];
 	if($status<$_SESSION['fileupload_size']) {
 		 echo $status;
 		 echo "\n";
 		 echo $_SESSION['fileupload_size'];
	   ++$_SESSION['time'];
 	}
 	else
 	{
 		echo "completed";
 	}
?></p>
</body>
</html>
<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="refresh" content="1">
	<style>
#myProgress {
  width: 95%;
  background-color: #ddd;
  margin-left: 30px;
}

#myBar {
  width: 5%;
  height: 30px;
  background-color: #4CAF50;
}
</style>
<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 1000);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width=width+5; 
      elem.style.width = width + '%'; 
    }
  }
}
</script>
</head>
<body onload="move()">
<div id="myProgress">
  <div id="myBar"></div>
</div>
</body>
</html>
-->
