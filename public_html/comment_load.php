<?php
session_start();
 $servername="localhost";
     $username="root";
     $password="jaydeep";
     $conn=new mysqli($servername,$username,$password);
     if($conn->connect_error){
     die("connection failed" .$conn->connect_error);
     }
     $sql = "USE share";
     $conn->query($sql);
   $video=$_POST['v'].'.mp4';
   $comm_count="SELECT  COUNT(comment_video) AS count FROM comments WHERE filename='{$video}'";
   $result=$conn->query($comm_count);
   $count=mysqli_fetch_assoc($result);
   if ($_SESSION['count']<$count['count']) {
    $_SESSION['count']+=1;
    $load_comment_count=$count['count']-$_SESSION['count'];
$comm="SELECT * FROM comments WHERE filename='{$video}' ORDER BY comment_time DESC LIMIT 1";
	//echo $comm;
  $result1=$conn->query($comm);
  if (mysqli_num_rows($result1)) {

 echo $_SESSION['count'];
  while ($final=mysqli_fetch_assoc($result1)) {
 ?>
 <div style="padding-top:30px;padding-left: 10px;">
          <div style="background-color: #0693cd; width: 20%; margin-left: 10px; border-radius: 8px; margin-top: 100px;padding-top: 10px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px;">
         <h5 style="width: 100%; margin-top: -10px;letter-spacing: 3px;"><?php echo $final['emailid'];?></h5>
         </div>
    <p style="margin-left: 10px;"><?php echo htmlspecialchars_decode($final['comment_video']);  $time=time()-$final['comment_time'];$minute=round($time/60);if($minute<=60){ echo " ".$minute." Minute ago";} else if($minute>60 && $minute<=1440){$hours=round($minute/60);echo " ".$hours." Hours ago"; }?></p>
 </div>
 <?php     
  }
  }
}
?>