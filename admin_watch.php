<div id="r" >
<div ondblclick="doubleClick(event)" onclick="singleClick(event)" style="padding-top: 0px;padding-left: 0px;">
<video width="75%" height="75%"  style="border-radius: 8px;" preload="metadata" id="myVideo" autoplay>
       <source src="uploads/144*320/<?php echo $video;//problem?>" type="video/mp4" >
</video>
</div>
<a href="delete.php?video_delete=<?php echo $video;?>&t_nail=<?php echo $test['thumbnail'];?>" style="padding-left: 0px;">Delete Video</a>
<div>
<h5>Title</h5>
<input type="text" name="title" style="width: 95%;"><br>
<h5>Discription</h5>
<div id="text">
 <textarea value="" name="discription" col="50" row="50"  style="resize: none;width: 95%; height: 100px;"></textarea>
 </div>
<h5>Category<h5>
<select name="category" form="vupload" onchange="show()" id="s" style="width: 95%;">
   <option value="Educational">Educational</option>
  <option value="Entertainment">Entertainment</option>
</select>
<h5 id="three" style="display:none;">Sub Category<h5>
<select name="sub_category1" form="vupload" id="two" style="width: 95%;">
  <option value="Animation">Animation</option>
  <option value="Drawing">Drawing</option>
  <option value="Coding">Coding</option>
  <option value="Science_and_tech">Science & Tech</option>
  <option value="History">History</option>
  <option value="Economics">Economics</option>
</select>
<select name="sub_category2" form="vupload" id="one" style=";width: 95%;">
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
<input type="submit" name="save" value="Save">
</div>
</div>
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