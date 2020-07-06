<?php
session_start();
if (isset($_SESSION['emailid'])) { 
 foreach ($_POST as $key => $value) {
$_SESSION['checkbox']=$value;
 $video1="uploads/144*320/".$_SESSION['checkbox'];
  $video2="uploads/640*320/".$_SESSION['checkbox'];
 $servername="localhost";
  $username="root";
  $password="jaydeep";
  $conn = new mysqli($servername,$username,$password);
  if($conn->connect_error)
       {
        echo "connection fail";
        die("connection failed".$conn->connect_error);
       }
  $sql = "USE share";
  if($conn->query($sql))
      {
     
        $sql0="SELECT * FROM video WHERE emailid='{$_SESSION['emailid']}' AND filename='{$_SESSION['checkbox']}'";
        $r=$conn->query($sql0);
        if (mysqli_num_rows($r)) {
                 
          if($row=mysqli_fetch_assoc($r))
            {

              $thumbnail="thumbnails/".$row['thumbnail'];
              unlink($thumbnail);
            }
        }
        $sql1 = "DELETE FROM video WHERE emailid='{$_SESSION['emailid']}' AND filename='{$_SESSION['checkbox']}'";
          if($conn->query($sql1))
           {
              $conn->close();
              unlink($video1);
              unlink($video2);
            }
      }
}
header("Location: http://you13.com?category=myvideos&state=1");    
}
else{
    header("Location: http://you13.com?category=account");
}
//print_r($_POST);

/* old code with problem
session_start();
if (isset($_SESSION['emailid'])) {
  for ($i=1; $i <= sizeof($_POST); $i++) { 
 $checkbox="checkbox".$i;
 $_SESSION['checkbox']=$_POST[$checkbox];
 $checkbox2="check".$i;
 $_SESSION['checkbox2']=$_POST[$checkbox2];
 $video1="uploads/144*320/".$_SESSION['checkbox'];
  $video2="uploads/640*320/".$_SESSION['checkbox'];
  $thumbnail="thumbnails/".$_SESSION['checkbox2'];
  $thumbnail=substr($thumbnail, 0 , (strrpos($thumbnail, "."))).".png";
  $servername="localhost";
  $username="root";
  $password="jaydeep";
  $conn = new mysqli($servername,$username,$password);
  if($conn->connect_error)
       {
        echo "connection fail";
        die("connection failed".$conn->connect_error);
       }
  $sql = "USE share";
  if($conn->query($sql))
      {
        $sql1 = "delete from video where emailid='{$_SESSION['emailid']}' and filename='{$_SESSION['checkbox']}'";
          if($conn->query($sql1))
            {
              $conn->close();
              unlink($video1);
              unlink($video2);
              unlink($thumbnail);
            }
      }
}
header("Location: http://you13.com?category=myvideos&state=1");    
}
else{
    header("Location: http://you13.com?category=account");
}
*/
?>
