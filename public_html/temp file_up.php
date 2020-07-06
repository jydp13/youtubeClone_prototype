<?php
if ($_POST['quality']=="144") {
?>
<video width="75%" height="75%"  style="border-radius: 8px;" preload="metadata" id="myVideo" autoplay>
       <source src="uploads/144*320/<?php echo $video;//problem?>" type="video/mp4" >
</video>
<?php } else if($_POST['quality']=="640"){?>
<video width="75%" height="75%"  style="border-radius: 8px;" preload="metadata" id="myVideo" autoplay>
       <source src="uploads/640*320/<?php echo $video;//problem?>" type="video/mp4" >
</video>
<?php }?>