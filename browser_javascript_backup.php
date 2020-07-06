<!DOCTYPE html>
<html>
<body onload="change()">
<script type="text/javascript">
function change(){
	var browser = '';
var browserVersion = 0;

if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
    browser = 'Opera';
} else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
    browser = 'MSIE';
} else if (/Navigator[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
    browser = 'Netscape';
} else if (/Chrome[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
    browser = 'Chrome';
} else if (/Safari[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
    browser = 'Safari';
    /Version[\/\s](\d+\.\d+)/.test(navigator.userAgent);
    browserVersion = new Number(RegExp.$1);
} else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
    browser = 'Firefox';
}
if(browserVersion === 0){
    browserVersion = parseFloat(new Number(RegExp.$1));
}
var now = new Date();
document.getElementById("localtime").value=now; 
document.getElementById("width").value=screen.width;
document.getElementById("height").value=screen.height; 
document.getElementById("f").submit();
}
</script>
<form action="localtime.php" method="post" id="f">
<input type="hidden" id="localtime" name="localtime" value=" ">
<input type="hidden" id="width" name="width" value=" ">
<input type="hidden" id="height" name="height" value=" ">
</form>
</body>
</html>