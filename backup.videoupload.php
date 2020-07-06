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
  position: absolute;
  left: 200px;

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
function Uploading(){
	document.getElementById('status').style.display = "block";
	document.getElementById('uploaddiv').style.display = "none";
	
}
</script>
</head>
<body style="padding: 0px;margin: -21px;">
  <div id="uploaddiv" style="margin-left: 50px;">
    <div class="uploadbutton" onclick="/*document.getElementById('loadiframe').click();*/document.getElementById('uploadbutton').click();" style="padding-top: 0px;margin-top: 0px; width: 95%; " >
<!--<a href="javascript:void(0)" onclick="document.getElementById('uploadbutton').click();parent.document.getElementById('infoiframe').src = 'videoinfo.php'" id="loadiframe"></a>-->
      <h5 align="center" style="padding-top: 10px;">Upload Video</h5>
    </div>
   </div>
   <form action="video_upload.php" method="post" enctype="multipart/form-data">
      <input type="file" accept="video/*" name="filename" id="uploadbutton" onchange="javascript:this.form.submit();Uploading();parent.document.getElementById('infoiframe').src = 'videoinfo.php';/*parent.document.getElementById('progress').src = 'progress.php*/'">
  </form>
  <div style="width:100%;height:100%;opacity:.95;top:0;left:0;display:none;position:fixed;background-color:#313131  ;
     overflow:auto" id="status">
   <p>Uploading.....</p>
  </div> 
</body>
</html>