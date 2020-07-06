<?php
session_start();
/*if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["filename"])) {
$temp = explode(".", $_FILES["filename"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["filename"]["tmp_name"], "../original_video/" . $newfilename);
$_SESSION['filename']=$newfilename;
}*/
if(isset($_SESSION['emailid'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["filename"])) {
  $video_allowed =  array('mp4','avi' ,'mkv');
  $video_ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
  if(!in_array($video_ext,$video_allowed)){
   //header("Location: http://you13.com?error=videoerror");
    echo "Video Format Not Suported";
  }
  else{
  $servername="localhost";
  $username="root";
  $password="";
  $conn = new mysqli($servername,$username,$password);
  if($conn->connect_error){
      die("connection failed".$conn->connect_error);
  }
  $size=$_FILES['filename']['size'];
  $temp = explode(".", $_FILES["filename"]["name"]);
  $microtime=round(microtime(true));
  $temp_newname_thumbnail=$microtime . '.png';
  $newfilename = $microtime . '.' . end($temp);
  $location2="../original_video/";
 $location='uploads/';
  $email=$_SESSION['emailid'];
  if(move_uploaded_file($_FILES["filename"]["tmp_name"], $location2.$newfilename)){
      $location1='uploads/144*320/';
      //$location3='uploads/640*320/';
      $video_dir="../original_video/".$newfilename;
      $thumbnail_dir="thumbnails/".$temp_newname_thumbnail;
      $time=2;// no of second from where it will extract frame
      for($i=1;$i<=1;$i++){
          $duration='ffprobe -i '.$video_dir.' -show_entries format=duration -v quiet -of csv="p=0"';
          $command="ffmpeg -ss 00:00:".$time." -i ".$video_dir." -vf scale=400:-1 -vframes 1 ".$thumbnail_dir;
          $command2="ffmpeg -i ".$location2.$newfilename." -s 144x320 -c:a copy ".$location1.$newfilename;
          //$command3="ffmpeg -i ".$location2.$newfilename." -s 640x320 -c:a copy ".$location3.$newfilename;
          exec($command);
          exec($command2);
            $duration_in_sec=exec($duration);
            if ($duration_in_sec<60) {
              $category_clip='Clips';
              $_SESSION['clip']='true';
            }
            else{
              $category_clip='Video';
            }
          $_SESSION['filename']=$newfilename;
        
          //exec($command3);
      }
     //insert into database
      $sql = "USE share";
      if($conn->query($sql)){
        $sql1 = "INSERT INTO video(filename,size,upload_directory,upload_date,emailid,views,thumbnail,category,visibility)".
                "VALUES('$newfilename','$size','$location',CURDATE(),'$email','0','$temp_newname_thumbnail','$category_clip','Private')";
        $result1=$conn->query($sql1);
        if($result1==FALSE){
           mysqli_rollback($conn);
         }
         else{
           mysqli_commit($conn);
           $conn->close();
         }
      }
     
    }
   else{
       //show error if file size is to lrge to upload and other error if file can not be uploaded
      echo "video can not be uploaded due to some error";
      }
   }
 }
 else if($_SERVER["REQUEST_METHOD"] == "POST" && empty($_FILES["filename"])){
//header("Location: http://localhost:2000?category=account");
 echo "Please select file to upload";
 }
}
else {
header("Location: http:/?localhost:2000?category=account");
}
?>












<html>
  <head>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <link rel="stylesheet" type="text/css" href="bodystyle.css">
    <link rel="stylesheet" type="text/css" href="layout.css">
    <style type="text/css">
      #bar_blank {
        border: solid 1px #000;
        width: 95%;
        margin-top: 43px;
      }
      #bar_color {
        background-color: red;
        height: 35px;
        width: 0px;
      }
      #bar_blank, #hidden_iframe {
        display: none;
      }
    </style>
    <script type="text/javascript">
      var myUrl = 'http://localhost:2000/?category=upload';
      if(window.top.location.href !== myUrl) {
        window.top.location.href = myUrl;
      }
    </script>
    <script type="text/javascript">
      function show() {
      document.getElementById('progress').innerHTML='<div id="bar_blank"><div id="bar_color"></div></div><p id="status" align="center" style="position: fixed;margin-left: 400px;margin-top: 0px;"></p>';
      }
    </script>
  </head>
  <body>
    <div style="height: 127px;box-shadow: 1px 1px 30px #888888;border-radius:8px;margin-left: 10px; margin-right:20px;width:98%;margin-top:1px;">
      <div style="float: left;width: 15%;height:150px;margin-left: 2px;cursor: pointer;" onclick="document.getElementById('file_select').click()" id="thumbnail_image">
       <h4 align="center" >Click here <br>to select video</h4>
     </div>
      <div style="width: 62%;height:150px; float: left;" id="progress">
      <div id="" style="margin-top:43px;border: solid 1px #000;"><div id="" style="height:35px;">
      <p id="status" align="center" style="position: fixed;margin-left: 400px;margin-top: 0px;">Video file not selected.Please select video file to upload</p>
    </div>
    </div>
    </div>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"
id="myForm" enctype="multipart/form-data" target="hidden_iframe">





<input type="hidden" value="myForm"name="<?php echo ini_get("session.upload_progress.name"); ?>">






<input type="file" name="filename" style="display: none;" id="file_select">
  <div style="width: 20.37%;height:150px;float: left;margin-right: 10px;margin: auto;padding: auto;">
<input type="submit" value="Upload" onclick="start()" style="margin-top: 40px;" id="submit_button">
</div>
</div> 
  </form>
<script type="text/javascript">
function toggleBarVisibility() {
var e = document.getElementById("bar_blank");
e.style.display = "block"/*(e.style.display == "block") ? "none" : "block";*/
}
 
function createRequestObject() {
var http;
if (navigator.appName == "Microsoft Internet Explorer") {
http = new ActiveXObject("Microsoft.XMLHTTP");
}
else {
http = new XMLHttpRequest();
}
return http;
}
 
function sendRequest() {
var http = createRequestObject();
http.open("GET", "upload_session.php");
http.onreadystatechange = function () { handleResponse(http); };
http.send(null);
}
 
function handleResponse(http) {
var response;
if (http.readyState == 4) {
response = http.responseText;
document.getElementById("bar_color").style.width = response + "%";
document.getElementById("status").innerHTML = response + "%";
 
if (response < 100) {
setTimeout("sendRequest()", 1000);
}
else {
toggleBarVisibility();
parent.document.getElementById('infoiframe').src = 'videoinfo.php';
t_nail();
}
}
}
 
function startUpload() {
toggleBarVisibility();
setTimeout("sendRequest()", 1000);
}
function start(){
var nme = document.getElementById("file_select");
if(nme.value.length < 1) {
    alert('Please select video to upload!');
    return false;
}
else{
  show();
(function () {
document.getElementById("myForm").onsubmit = startUpload;
})();
}
}
</script>
<script type="text/javascript">
  function t_nail(){
     var hr1 = new XMLHttpRequest();
    var url = "thumbnail.php";
    //var thumbnail="<?php //echo explode('.', $_SESSION['filename'])[0].".png";?>";
    //var eid="<?php //echo $_SESSION['emailid'];?>";
    //var vars = "thumbnail="+thumbnail+"&eid="+eid;
    hr1.open("POST", url, false);
    hr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr1.onreadystatechange = function() {
      if(hr1.readyState == 4 && hr1.status == 200) {
        var return_data = hr1.responseText;
      document.getElementById("thumbnail_image").innerHTML = return_data;
      }
    }
    //hr1.send(vars); 
     hr1.send();
  }
</script>
<iframe src="" name="hidden_iframe" style="visibility: hidden;"></iframe>
</body>
</html>
<?php
/*session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["filename"])) {
  $temp = explode(".", $_FILES["filename"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $location2="../original_video/";
  if(move_uploaded_file($_FILES["filename"]["tmp_name"], $location2.$newfilename)){
      $temp_newname_thumbnail=round(microtime(true)) . '.png';
      $location1='uploads/144*320/';
      $location3='uploads/640*320/';
      $video_dir="../original_video/".$newfilename;
      $thumbnail_dir="thumbnails/".$temp_newname_thumbnail;
      $time=5;// no of second from where it will extract frame
      for($i=1;$i<=1;$i++){
          $command="ffmpeg -ss 00:00:".$time." -i ".$video_dir." -vf scale=400:-1 -vframes 1 ".$thumbnail_dir;
          $command2="ffmpeg -i ".$location2.$newfilename." -s 144x320 -c:a copy ".$location1.$newfilename;
          $command3="ffmpeg -i ".$location2.$newfilename." -s 640x320 -c:a copy ".$location3.$newfilename;
          exec($command);
          exec($command2);
          exec($command3);
      }
    }
}*/
?>
