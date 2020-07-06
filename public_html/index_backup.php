<?php
session_start();
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (preg_match('/video/i', $actual_link)) {
	$pattern='/'.$_GET['category'].'/i';
	if (preg_match($pattern, $actual_link)) {
	 $_SESSION['service']='video_play_'.$_GET['category'].'_'.$_GET['subcategory'];	
	}
}
else if(preg_match('/services/i', $actual_link)){
	$_SESSION['service']='services_page';
}
else if(preg_match('/clips/i', $actual_link)){
	$_SESSION['service']='clips_page';
}
else if(preg_match('/Educational/i', $actual_link)){
	$_SESSION['service']='educational_page';
}
else if(preg_match('/Entertainment/i', $actual_link)){
	$_SESSION['service']='entertainment_page';
}
else if(preg_match('/Account/i', $actual_link)){
	$_SESSION['service']='sign_page';
}
else{
	$_SESSION['service']='index_page';
}
if (!isset($_COOKIE['user']))
 {
 	$id=round(microtime(true));
    setcookie("user",$id,time()+86400,"/");
 	include_once('../header.php');
    include_once("../page_generate.php");
    include_once('../footer.php');
    include_once("../visitor_counter.php");
  }
else
{
   include_once('../header.php');
   include_once("../page_generate.php");
   include_once('../footer.php');
}
?>








