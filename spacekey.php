<a id="press" href="javascript:void(0)" onclick="singleClick(event)"
    ondblclick="doubleClick(event)">Click here</a>

<div id="log"></div>
<script type="text/javascript">
	 var timer;
    var status = 1;

    function singleClick(event) {
        status = 1;
        timer = setTimeout(function() {
            if (status == 1) {
                document.getElementById("log").innerHTML ='I  am single click !';
            }
        }, 500);

    }

    function doubleClick(event) {
        clearTimeout(timer);
        status = 0;
        document.getElementById("log").innerHTML = 'I  am a double  click!';
    }
</script>