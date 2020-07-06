<?php 
session_start();
if(isset($_POST))
{
if(!empty($_POST["firstname"])&&!empty($_POST["lastname"])&&!empty($_POST["emailid"])&&!empty($_POST["mobileno"])&&!empty($_POST["password1"])&&!empty($_POST["password2"]))
 {
   $servername="localhost";
   $username="root";
   $password="jaydeep";
   if ($p!=$p2) {
     header("Location: http://you13.com?category=account&page=signup");
     die();
   }
   else
  {
   
   if($conn->connect_error)
    {
     die("connection failed".$conn->connect_error);
    }
    $conn = new mysqli($servername,$username,$password);
   $u=mysqli_real_escape_string($conn, htmlspecialchars($_POST["firstname"]));
   $a=mysqli_real_escape_string($conn, htmlspecialchars($_POST["lastname"]));
   $b=mysqli_real_escape_string($conn, htmlspecialchars($_POST["emailid"]));
   $c=mysqli_real_escape_string($conn, htmlspecialchars($_POST["mobileno"]));
   $p=mysqli_real_escape_string($conn, htmlspecialchars($_POST["password1"]));
   $p2=mysqli_real_escape_string($conn, htmlspecialchars($_POST["password2"]));
   $hash_password = hash('sha512', $p);
   $sql = "USE share";
   $conn->query($sql);
   $usertest="SELECT emailid FROM user WHERE emailid='{$b}'";
   if (mysqli_num_rows($conn->query($usertest))) {
   header("Location: http://you13.com?category=account&state=2");
   }
   else
    { 
      if (filter_var($b, FILTER_VALIDATE_EMAIL)) {
          $sql1 = "INSERT INTO user(firstname,lastname,mobileno,emailid,password) VALUES('$u','$a','$c','$b','$hash_password')";
             if($conn->query($sql1))
             {
               $_SESSION['emailid']=$b;
               $conn->close();
               header("Location: http://you13.com?category=account");
             }
         }
         else{
          header("Location: http://you13.com?category=account&page=signup");
         }
      
    }
  }
}
else{
 header("Location: http://you13.com?category=account&page=signup");
  
}
}
else
{
  echo "not ok";
}

?>
