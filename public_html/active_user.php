<?php
include_once('../mysql.php');
$sql="INSERT INTO user_state(state) VALUES('offline')";
$conn->query($sql);
?>