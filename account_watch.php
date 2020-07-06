<div ondblclick="doubleClick(event)" onclick="singleClick(event)">
<video width="75%" height="75%"  style="border-radius: 8px;" preload="metadata" id="myVideo" autoplay>
       <source src="uploads/144*320/<?php echo $video;//problem?>" type="video/mp4" >
</video>
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
	document.getElementById("myVideo").style=" position: fixed; right: 0; bottom: 0;min-width: 500%; min-height: 500%;width: auto; height: auto; z-index: -100;background: url(polina.jpg) no-repeat;background-size: cover;cursor:none;";
	document.getElementById('header_hide').innerHTML=' ';
	}
</script>