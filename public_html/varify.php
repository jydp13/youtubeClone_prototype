<?php
$image_allowed =  array('jpeg','png' ,'jpg');
$videoallowed =  array('mp4','avi' ,'mkv');
$image_ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
$video_ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
if(!in_array($image_ext,$image_allowed) ) {
    echo 'error';
}
else if(!in_array($video_ext,$video_allowed)){
	echo 'error';
}
else
{

}
?>