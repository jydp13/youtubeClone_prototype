<?php
session_start();
$servername="localhost";
 $username="root";
 $password="jaydeep";
 $b=htmlspecialchars($_POST["emailid"]);
 $_SESSION['email']=$b;
 $conn = new mysqli($servername,$username,$password);
if($conn->connect_error)
 {
  die("connection failed".$conn->connect_error);
 }
 $sql = "USE share";
  $conn->query($sql);
  $sql2="SELECT * FROM user WHERE emailid='{$_SESSION['email']}'";
  $result=$conn->query($sql2);
  if($result){
           $test=mysqli_fetch_assoc($result);
           $to = $_POST['emailid'];
           $subject = "vtube";

           $message = "
                       <html>
                        <body>
                           <p>Please open bellow link to reset password</p>
                            <a href='https://tech5736.000webhostapp.com/new_password_form.php?unique_id={$test['unique_id']}'>Click here</a>
                        </body>
                       </html>
                      ";
           $headers = "MIME-Version: 1.0" . "\r\n";
           $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           mail($to,$subject,$message,$headers);
   }
   else
   {
   	echo "User Email Id not found";
   }

?>