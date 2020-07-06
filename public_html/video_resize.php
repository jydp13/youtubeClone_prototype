<?php
$newfilename="1.mp4";
$new="newfilename.mp4";
$command="ffmpeg -i ".$newfilename." -s 144x320 -c:a copy ".$new;
                   exec($command);
?>