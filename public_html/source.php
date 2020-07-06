<?php
session_start();
$url="www.you13.com/?category=home";
print_r(explode("/", $url)[0]);
?>