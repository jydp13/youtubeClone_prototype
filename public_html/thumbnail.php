<?php 
session_start();
if (isset($_SESSION['emailid'])) {
	$thumbnail=explode('.', $_SESSION['filename'])[0].".png";
echo "<img src='thumbnails/".$thumbnail."' width='100%' height='85%' style='border-radius:8px;'></img>";	
}
else{
	echo 'default thumbnail';
}

?>

