<?php 

if(!empty($_POST["firstname"])&&!empty($_POST["lastname"])&&!empty($_POST["emailid"])&&!empty($_POST["mobileno"])&&!empty($_POST["password1"])){
     signup("share","user");

 }
 else
 {
 	echo "hello";
 }
?>
<?php 
function signup($database,$table)
{
 include_once("mysql.php");	
   $u=$_POST["firstname"];
 $a=$_POST["lastname"];
 $b=$_POST["emailid"];
 $c=$_POST["mobileno"];
 $p=$_POST["password1"];
 $sql = "USE ".$database;
 $conn->query($sql);
 $sql1 = "INSERT INTO `{$table}`(firstname,lastname,mobileno,emailid,password) VALUES('$u','$a','$c','$b','$p')";
 $conn->query($sql1);
 $conn->close();
} 
?>
