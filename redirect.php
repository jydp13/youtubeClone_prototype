<?php
function signup($database,$table)
{
 echo $database;
 echo $table;
 $servername="localhost";
 $username="root";
 $password="jaydeep";
 $u=$_POST["firstname"];
 $a=$_POST["lastname"];
 $b=$_POST["emailid"];
 $c=$_POST["mobileno"];
 $p=$_POST["password1"];
 $conn = new mysqli($servername,$username,$password);
if($conn->connect_error)
 {
  die("connection failed".$conn->connect_error);
 }
if(!empty($u)&&!empty($a)&&!empty($b)&&!empty($c)&&!empty($p)){
 $sql = "USE ".$database;
 $conn->query($sql);
 $sql1 = "INSERT INTO `{$table}`(firstname,lastname,mobileno,emailid,password) VALUES('$u','$a','$c','$b','$p')";
 $conn->query($sql1);
 $conn->close();
 header("Location:public_html/index.php");
 }
 else
 {
  
  echo "please fill all field<br>";
  
 }

}  
?>
