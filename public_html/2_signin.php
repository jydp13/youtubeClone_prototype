<?php
signin("share","user");
function signin($database,$table){
 $servername="localhost";
 $username="root";
 $password="jaydeep";
 $b=htmlspecialchars($_POST["emailid"]);
 $hash_pass=htmlspecialchars($_POST["password1"]);
 $p=hash('sha512',$hash_pass);
 $conn = new mysqli($servername,$username,$password);
if($conn->connect_error)
 {
  die("connection failed".$conn->connect_error);
 }
if(!empty($b)&&!empty($p))
 {
 $sql = "USE ".$database;
 $conn->query($sql);
 $sql1 = "SELECT*FROM `{$table}`";
 $result=$conn->query($sql1);
 if(mysqli_num_rows($result))
  {
    while($row=mysqli_fetch_assoc($result))
     {
      if(($b==$row['emailid'])&&($p==$row['password']))
        {
         session_start();
         $_SESSION['emailid']=$b;
         $conn->close();
         header("Location: http://you13.com?category=account");

        }
     }
   }
 else
   {
        echo "Not a valid e-mail address or password";
  }
}
 else
 {
   header("Location: http://you13.com?category=account");
 }
}
?>
    

