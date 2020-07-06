<?php
session_start();
if(isset($_SESSION['emailid']))
 {
  $emailid=$_SESSION['emailid'];
  $video1="uploads/144*320/".$_GET['video_delete'];
  $video2="uploads/640*320/".$_GET['video_delete'];
  $thumbnail="thumbnails/".$_GET['t_nail'];
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
        $sql1 = "DELETE FROM video WHERE emailid='{$emailid}' AND filename='{$_GET['video_delete']}'";
          if($conn->query($sql1))
            {
              $conn->close();
              unlink($video1);
              unlink($video2);
              unlink($thumbnail);
              header("Location: http://you13.com?category=myvideos&state=1");
            }
          else
            {
              echo "Unable to delete";
            }
      }
  else
     {
       echo "Sorry unable to delete";//database not selected
     }
  }
else
 {
  header("Location: http://you13.com?category=account");
 }
?>