
<?php
session_start();
if(isset($_POST['email']) && strlen($_POST['email'])){
 $servername="localhost";
 $username="id3543093_root";
 $password="jydp@";
 $b=htmlspecialchars($_POST["email"]);
 $_SESSION['emailid']=$b;
 $conn = new mysqli($servername,$username,$password);
if($conn->connect_error)
 {
  die("connection failed".$conn->connect_error);
 }
  $sql = "USE id3543093_share";
  $conn->query($sql);
  $sql2="INSERT INTO user(emailid) VALUES('{$b}')";
  echo $sql2;
  if($conn->query($sql2)){
           $code=substr(md5(mt_rand(0,100)),0,9);
           $to = $_POST['email'];
           $subject = "vtube";

           $message = "Your varification code is".$code;
           mail($to,$subject,$message);
?>
<p align='center'>PLease check your email for varification code</p>
 <form action="insert.php" method="post">
      <input type="text" name="code">
      <input type="submit" value="code">
    </form>
<?php
   }
   else
   {
    echo "Not ok";
   }    
}
else
{
?>
<form action="signup.php" method="post">
    emailid<input type="text" name="email">
    <input type="submit" value="signup">
</form>
<?php
}
?>