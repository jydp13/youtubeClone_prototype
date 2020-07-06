<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="formstyle.css">
      <link rel="stylesheet" type="text/css" href="bodystyle.css">
      <link rel="stylesheet" type="text/css" href="layout.css">
      <style>
#myProgress {
  width: 65%;
  background-color: #ddd;
  float: left;
  margin-left: 5px;

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
<body>
<h5>Upload Video :</h5>
<!--<div style="float: left;">
	<img src="icon/uploading.gif" width="70" height="70"></img>
</div>
-->
<div id="myProgress">
  <div id="myBar"></div>
</div>
<div class="uploadbutton" onclick="document.getElementById('uploadbutton').click();" style="float: right;">
   <form action="test.php" method="post" enctype="multipart/form-data">
 <input type="file" accept="video/*" name="filename" id="uploadbutton" onchange="move();">
  </form>
</div>
 
</body>
</html>