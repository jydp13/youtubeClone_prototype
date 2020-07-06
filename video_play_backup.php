<?php
   session_start();
    include_once("../header.php");
    if(isset($_GET['video'])){
      $video=$_GET['video'].'.mp4';
      $_SESSION['filename']=$video;
    }
    include_once('../mysql.php');
  if ($_GET['usertype']=="admin") {
     if (isset($_SESSION['emailid'])) {
       include_once('../account_home_menu.php');
?>
<div ondblclick="doubleClick(event)" onclick="singleClick(event)" style="padding-top: 50px;padding-left: 140px;">
<video width="75%" height="75%"  style="border-radius: 8px;" preload="metadata" id="myVideo" autoplay>
       <source src="uploads/144*320/<?php echo $video;//problem?>" type="video/mp4" >
</video>
</div>
<a href="delete.php?video_delete=<?php echo $video;?>&t_nail=<?php echo $test['thumbnail'];?>" style="padding-left: 140px;">Delete Video</a>
<script type="text/javascript">
	function singleClick(event) {
    status = 1;
    timer = setTimeout(function() {
        if (status == 1) {
            toggle();
        }
    }, 500);
}
function doubleClick(event) {
    clearTimeout(timer);
    status = 0;
    toggleFull()
}
function toggleFull() {
    var elem = document.body; // Make the body go full screen.
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
    if (isInFullScreen) {
        cancelFullScreen(document);
        video_min();
        togglePlay();
    }
    else {
        requestFullScreen(elem);
        video_full();
        togglePlay();
    }
    return false;
}
function cancelFullScreen(el) {
    var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(el);
    } 
    else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function requestFullScreen(el) {
    // Supports most browsers and their versions.
    var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;
    if (requestMethod) { // Native full screen.
        requestMethod.call(el);
    }
    else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    return false
}
function togglePlay(){
    var myVideo=document.getElementById('myVideo');
    return myVideo.paused ? myVideo.pause() : myVideo.play();
};
function toggle(){
    var myVideo=document.getElementById('myVideo');
    return myVideo.paused ? myVideo.play() : myVideo.pause();
};
document.onkeydown = function(e){
 if(e.keyCode == 32 && e.target == document.body) {
    e.preventDefault();
     toggle();
  }
}
function video_full(){
	document.getElementById("myVideo").style=" position: fixed; right: 0; bottom: 0;min-width: 100%; min-height: 100%;width: auto; height: auto; z-index: -100;background: url(polina.jpg) no-repeat;background-size: cover;cursor:none;";
	document.getElementById('header_hide').innerHTML=' ';
		document.getElementById('admin_menu_hide').innerHTML=' ';
	}
	function video_min(){
		document.getElementById("myVideo").style="width: 75%; height: 75%;border-radius: 8px;cursor:default;";
		document.getElementById('header_hide').innerHTML=' <div id="header"  class="fix" style="z-index: 1;"><div id="menu"><a href="http://you13.com/" class="menu">Home</a><a href="http://you13.com/?category=educational" class="menu">Educational</a> <a href="http://you13.com/?category=entertainment" class="menu">Entertainment</a><a href="http://you13.com/?category=clips" class="menu">Clips</a><a href="http://you13.com/?category=account" class="menu">Account</a> </div><form><div id="right"><input type="text" name="search" id="search" style="width: 50%" /></td><td><input type="submit" id="searchbutton" value="Search" onclick="return check()"></div></form><hr style="margin-top: 50px;"></div>';
		document.getElementById('admin_menu_hide').innerHTML='<div id="left" ><a href="http://you13.com?category=admin_home"><div id="admin_menu"><p class="admin_menu">Home</p></div></a><a href="http://you13.com?category=upload" ><div id="admin_menu"><p class="admin_menu">Upload Video</p></div></a>  <a href="http://you13.com?category=myvideos" ><div id="admin_menu"><p class="admin_menu">My Videos</p></div></a><a href="http://you13.com?category=groups" ><div id="admin_menu"><p class="admin_menu">Groups</p></div></a><div id="admin_menu"><a  style="display: none;"  id="delete" onclick="document.getElementById("del").click();" class="admin_menu">Delete</a></div><a href="http://you13.com?category=logout" > <div id="admin_menu"><p class="admin_menu">Logout</p></div></a><!--<input type="submit" name="" onclick="menu_hide()">--></div>';
	}
</script>
<?php
      //include_once('../account_watch.php');
      $sql2="SELECT * FROM video WHERE filename='{$video}' AND emailid='{$_SESSION['emailid']}'";
      $views=$conn->query($sql2);
      $test=mysqli_fetch_assoc($views);	
      //include_once('../video_play.php');
      //include_once('../account_feature.php'); 
     }
   }
   else{
 unset($_SESSION['refresh']);
  $sql2="SELECT * FROM video WHERE filename='{$video}'";
  $views=$conn->query($sql2);
  $test=mysqli_fetch_assoc($views);
?>           
<!--<script type="text/javascript">
    function change(){
        document.getElementById("").innerHTML = "";
}
</script>-->
<script type="text/javascript">
function like() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("likes").innerHTML =this.responseText;
    }
  };
  xhttp.open("GET", "like.php?video=<?php echo explode(".", $video)[0];?>", true);
  xhttp.send();
}
function singleClick(event) {
    status = 1;
    timer = setTimeout(function() {
        if (status == 1) {
            toggle();
        }
    }, 500);
}
function doubleClick(event) {
    clearTimeout(timer);
    status = 0;
    toggleFull();
}
function Full() {
    var elem = document.body; // Make the body go full screen.
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
    if (isInFullScreen) {
        cancelFullScreen(document);
        video_min();
    } 
    else {
        requestFullScreen(elem);
        video_full();
    }
    return false;
}
function toggleFull() {
    var elem = document.body; // Make the body go full screen.
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
    if (isInFullScreen) {
        cancelFullScreen(document);
        video_min();
        togglePlay();
    
    }
    else {
        requestFullScreen(elem);
        video_full();
        togglePlay();

    }
    return false;
}
function cancelFullScreen(el) {
    var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(el);
    } 
    else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function requestFullScreen(el) {
    // Supports most browsers and their versions.
    var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;
    if (requestMethod) { // Native full screen.
        requestMethod.call(el);
    }
    else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    return false
}
function video_full(){
	document.getElementById("myVideo").style=" position: fixed; right: 0; bottom: 0;min-width: 100%; min-height: 100%;width: auto; height: auto; z-index: -100;background: url(polina.jpg) no-repeat;background-size: cover;cursor:none;";
	document.getElementById('hide').innerHTML=" ";
	document.getElementById('comment_post_hide').innerHTML=" ";
	document.getElementById('header_hide').innerHTML='';
	document.getElementById('side_video').innerHTML='';
	}
function video_min(){
 document.getElementById("myVideo").style="width: 100%; height: 75%;border-radius: 8px;cursor:default;";
 document.getElementById('header_hide').innerHTML=' <div id="header"  class="fix" style="z-index: 1;"><div id="menu"><a href="http://you13.com/" class="menu">Home</a><a href="http://you13.com/?category=educational" class="menu">Educational</a> <a href="http://you13.com/?category=entertainment" class="menu">Entertainment</a><a href="http://you13.com/?category=clips" class="menu">Clips</a><a href="http://you13.com/?category=account" class="menu">Account</a> </div><form><div id="right"><input type="text" name="search" id="search" style="width: 50%" /></td><td><input type="submit" id="searchbutton" value="Search" onclick="return check()"></div></form><hr style="margin-top: 50px;"></div>';
 document.getElementById('hide').innerHTML=' <table  style="padding: 0px; margin:  0px;"><tr style="padding: 0px; margin:  0px;"><td style="padding: 0px; margin:  0px;"> <!--<br><input type="submit" value="Video Quality"  onclick="change()">--></td></tr><tr><td><p><?php echo $test["title"];?></p></td></tr><?php include_once("../account_feature.php"); ?> <tr><td><p style="color: blue;"><?php echo $test["emailid"];?></p></td><td><p onclick="like()" id="likes" ><?php if ($test["likes"]>0){echo $test["likes"]." Likes";} else { echo "0 Likes";}?></p></td><td></td><td></td><td><p style="color: blue;"><?php if ($test["views"]>0){echo $test["views"]." Views";} else { echo "0 Views";}?></p></td> </tr></table>';
 document.getElementById('comment_post_hide').innerHTML='';
 document.getElementById('side_video').innerHTML='<div style="overflow: hidden;width: 30%;" id="side_video"><div id="watch_right" onscroll="yHandler()"  style="width: 29%;  padding-top: 50px; position: fixed; left: 72%; overflow-y: scroll; height: 90%;" > <div style="background-color: yellow; height: 150px;" ></div><br><input type="submit" name="" onclick="timer(8);"><div style="background-color: yellow; height: 150px;" ></div><br> <div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br><div style="background-color: yellow; height: 150px;" ></div><br></div><br></div></div>';

         
}
function togglePlay(){
    var myVideo=document.getElementById('myVideo');
    //return myVideo.paused ? myVideo.pause(): myVideo.play();
    if (myVideo.paused) {
    	myVideo.pause();
    	setTimeout(show_pause,20);
    }
    else{
    	myVideo.play();
    	hide_pause();
    }
};
document.onkeydown = function(e){
 if(e.keyCode == 32 && e.target == document.body) {
    e.preventDefault();
     toggle();
  }
}
function toggle(){
    var myVideo=document.getElementById('myVideo');
    //return myVideo.paused ? myVideo.play() : myVideo.pause();
    if (myVideo.paused) {
    	myVideo.play();
    	hide_pause();
    }
    else{
    	myVideo.pause();
    	setTimeout(show_pause,20);
    }
};
function show_pause(){
	  var elem = document.body; // Make the body go full screen.
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
    if (isInFullScreen) {
     document.getElementById('pause_icon').style='width:50px;height:50px;border-style: solid;border-width: 37px;border-color: #202020;  border-width: 37px 37px 37px 37px;border-color: red blue green yellow; border-width: 37px 0px 37px 74px;  border-color: red blue green yellow;  box-sizing: border-box;width: 74px;height: 74px;border-width: 37px 0px 37px 74px;border-color: transparent transparent transparent #202020;';
    }
    else {
       document.getElementById('pause_icon').style='position: relative; left: 460px;top: -280px;width:50px;height:50px;border-style: solid;border-width: 37px;border-color: #202020;  border-width: 37px 37px 37px 37px;border-color: red blue green yellow; border-width: 37px 0px 37px 74px;  border-color: red blue green yellow;  box-sizing: border-box;width: 74px;height: 74px;border-width: 37px 0px 37px 74px;border-color: transparent transparent transparent #202020;';
    }
    return false;
 
}
function hide_pause(){
	document.getElementById('pause_icon').style='display:none;';
}
function ajax_post(q){
    var hr = new XMLHttpRequest();
    var url = "quality.php";
    var ctime=document.getElementById("myVideo").currentTime;
    var vars = "quality="+q+"&ct="+ctime;
    hr.open("POST", url, false);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
	    if(hr.readyState == 4 && hr.status == 200){
		    var return_data = hr.responseText;
			document.getElementById("status").innerHTML = return_data;
            var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
            if(isInFullScreen) {
                video_full();
            }
            else{
              video_min();
            }
           document.getElementById("myVideo").currentTime=ctime;
	    }
    }
    hr.send(vars); 
}
var scroll=1500;
function timer(time)
{   
	var myVar = setInterval(myFunction, time);
    

}
function myFunction() {
	if (scroll==0) {
		clearInterval(myVar);
		scroll=1500;

		
	}
	else{
		var elmnt = document.getElementById("watch_right");
    elmnt.scrollTo(0, scroll);
    scroll=scroll-10;
	}
    
}
function t(){
	if( window.innerHeight < screen.height) {
  //full screen
  //setTimeout(function(){ alert("Hello"); }, 3000);
 //video_min();
}
else if(window.innerHeight == screen.height){
 //min screen
  //video_min();    //setTimeout(function(){ alert("H"); }, 3000);
}
}
//window.onload=t();
	window.onkeydown = function(e){
     if(e.keyCode == 27){
     	e.preventDefault();
     	video_min();
   //automatically call a function which press esc key atuomtically

    }
    else if (e.keyCode == 122) {
      e.preventDefault();
      video_min();

   //automatically call a function which press esc key atuomtically

    }
};
</script>
<script>
var ajax_request_count=1;
function yHandler(){
	var wrap = document.getElementById('watch_right');
	var contentHeight = wrap.offsetHeight;
	var yOffset = window.pageYOffset; 
	var y = yOffset + window.innerHeight;
	if(y >= contentHeight){
		if(ajax_request_count<=1){
		  ajax_request_count=ajax_request_count+1;
		   var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
             	warp.innerHTML.split('<input');

               var data =this.responseText;
               wrap.innerHTML += data;
             }
           };
          xhttp.open("GET", "side_video_load.php?c=<?php echo $_GET['category'];?>&sc=<?php echo $_GET['subcategory'];?>&video_not_load=<?php echo $_GET['video'];?>", true);
          xhttp.send(); 
		}
	}
}
window.onscroll=comment_load;
var comments_load_limt=1;
function comment_load(){
	if (comments_load_limt<=5) {
       var hr = new XMLHttpRequest();
    var url = "comment_load.php";
    var video=<?php echo $_GET['video'];?>;
    var vars = "quality="+video;
    hr.open("POST", url, false);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("comments").innerHTML += return_data;
	    }
    }
    hr.send(vars);
    comments_load_limt=comments_load_limt+1; 
	}
}
</script>

  <div id="body_left" style="float: left; width: 70%;">
     <div ondblclick="doubleClick(event)" onclick="singleClick(event)" id="status" style="padding-top: 50px; ">

      <?php include_once('../video_play.php');?>
      <div style="position: relative; left: 500px;top: -250px;display: none;" id="pause_icon"></div>
     </div>

     <div id="hide">
     <table  style="padding: 0px; margin:  0px;">
       <tr style="padding: 0px; margin:  0px;">
          <td style="padding: 0px; margin:  0px;"> 
              <!--<br>
              <input type="submit" value="Video Quality"  onclick="change()">-->
          </td>
        </tr>
        <tr>
          <td>
            <p><?php echo $test['title'];?></p>
          </td>
        </tr> 
        <tr>
          <td>
            <p style="color: blue;"><?php echo $test['emailid'];?></p>
          </td>
          <td>
              <p onclick="like()" id="likes" ><?php if ($test['likes']>0){echo $test['likes']." Likes";} else { echo "0 Likes";}?></p>
          </td>
          <td></td><td></td>
          <td>
            <p style="color: blue;"><?php if ($test['views']>0){echo $test['views']." Views";} else { echo "0 Views";}?></p>
          </td>  
        </tr>
    </table>
    </div>
  <div id="comment_post_hide">
 <?php include_once('../comment_post.php');?> 	
  </div> 
 </div>
<div style="overflow: hidden;width: 30%;" id="side_video">
 <div id="watch_right" onscroll="yHandler()"  style="width: 29%;  padding-top: 50px; position: fixed; left: 72%; overflow-y: scroll; height: 90%;" > 
  <div style="background-color: yellow; height: 150px;" ></div><br> 
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <div style="background-color: yellow; height: 150px;" ></div><br>
  <input type="submit" name="" onclick="timer(8);" value="Top" style="width: 17%;">
 </div>
 </div>
<?php
}
 include_once('../view_increment.php');
 include_once("../footer.php");

 ?>
