<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
      <link rel="stylesheet" type="text/css" href="bodystyle.css">
      <link rel="stylesheet" type="text/css" href="layout.css">
      <script>
      function test (){
          var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("s").innerHTML =this.responseText;
    }
  };
  xhttp.open("GET", "video_test.php", true);
  xhttp.send();
      }
 function show(){
    var x = document.getElementById("s").value;
    if(x=="Entertainment")
      {
        document.getElementById('three').style.display = "block";
        document.getElementById('two').style.display = "none";
        document.getElementById('one').style.display = "block";
      }
    else if(x=="Educational")
     {
       document.getElementById('one').style.display = "none";
       document.getElementById('two').style.display = "block";
     }
}
var myUrl = 'http://you13.com/?category=upload';
if(window.top.location.href !== myUrl) {
    window.top.location.href = myUrl;
}
/*
function validateForm() {
    var a = document.forms["myform"]["filename"].value;
    var b = document.forms["myform"]["thumbnail"].value;
    var c = document.forms["myform"]["title"].value;
    var d = document.forms["myform"]["discription"].value;
    var e = document.forms["myform"]["category"].value;
    var f = document.forms["myform"]["sub_category"].value;
    if (a == "") {
        alert("Please upload video");
        return false;
    }
    else if (b == "") {
        alert("Please upload thumbnail for video");
        return false;
    }
   else if (c == "") {
        alert("Please provide title for video");
        return false;
    }
   else if (d == "") {
        alert("Please provide discription for video");
        return false;
    }
   else if (e == "Select") {
        alert("Please select category of video");
        return false;
    }
   else if (f == "Select") {
        alert("Please select sub category of video");
        return false;
    }
    if (a!="") {
      document.getElementById('videocheck').style.display = "table";
      return true;
    }
   
}*/
</script>
</head>
<body style="background-color: white;box-shadow: 1px 1px 30px #888888;border-radius:8px; padding-bottom: 10px;margin-left: 10px; margin-right:20px;width:98%;margin-top:1px;" onload="test()">
<div align="left" style="margin-top: 50px;margin-left: 50px;">
 <form action="videoinfo_upload.php" method="post" enctype="multipart/form-data" id="vupload" name="myform" onsubmit="return validateForm()">
 <div class="uploadbutton" onclick="document.getElementById('uploadthumbnail').click()" style="position: relative; top: 30px; width: 95%;">
 <input type="file" name="thumbnail" id="uploadthumbnail" accept="image/*"><p id="thumbnail" align="center" style="padding-top: -10px; margin-top: -10px;">Upload Custom Thumbnail</p>
 </div>
 <br><br>
 <h5 style="position: relative; top: 30px;">Ttile :</h5>
 <input style="width: 95%;" type="text" name="title" autocomplete="off" ><br>
 <h5 >Discription :</h5>
 <div id="text">
 <textarea value="" name="discription" col="50" row="50"  style="resize: none;width: 95%; height: 100px;"></textarea>
 </div>
</form>
<h5>Category<h5>
<select name="category" form="vupload" onchange="show()" id="s" style="width: 95%;">
     <option value="Educational">Educational</option>
  <option value="Entertainment">Entertainment</option>
</select>
<h5 id="three" style="display:none;">Sub Category<h5>
<select name="sub_category1" form="vupload" id="two" style="display:none;width: 95%;">
  <option value="Animation">Animation</option>
  <option value="Drawing">Drawing</option>
  <option value="Coding">Coding</option>
  <option value="Science_and_tech">Science & Tech</option>
  <option value="History">History</option>
  <option value="Economics">Economics</option>
</select>
<select name="sub_category2" form="vupload" id="one" style="display:none;width: 95%;">
  <option value="Music">Music</option>
  <option value="Movies">Movies</option>
  <option value="Sport">Sport</option>
  <option value="Vlog">Vlog</option>
  <option value="Shows">Shows</option>
  <option value="Events">Events</option>
</select>
<h5>Visibility</h5>
<select name="visibility" form="vupload" id="four" style="width: 95%;">
  <option value="Private">Private</option>
  <option value="Public">Public</option>
  <option value="Group">Group</option>
</select>
 <input type="submit" value="Save Video Info" name="submit" form="vupload" style="width: 95%;">
</div>
</body>
</html>
