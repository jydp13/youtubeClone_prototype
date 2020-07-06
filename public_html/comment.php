<?php
session_start();
if (isset($_SESSION['emailid'])) {
    if (!empty(isset($_POST['comment']))) {
        include_once('../mysql.php');
        $comment=mysqli_real_escape_string($conn, htmlspecialchars($_POST["comment"]));
		 $emailid=mysqli_real_escape_string($conn, htmlspecialchars($_SESSION["emailid"]));
		 $filename=mysqli_real_escape_string($conn, htmlspecialchars($_POST["filename"]));
        $time=time();
        mysqli_autocommit($conn,FALSE);
        $sql="INSERT INTO comments(filename,emailid,comment_video,comment_time,comment_date) VALUES('{$filename}','{$emailid}','{$comment}','$time',CURDATE())";
        $comment=$conn->query($sql);

        if($comment==FALSE){
        	mysqli_rollback($conn);

        }
        else{
        	mysqli_commit($conn);
      $comments="SELECT * FROM comments WHERE filename='{$_POST['filename']}' ORDER BY comment_time DESC LIMIT 6";
  $result1=$conn->query($comments);
  if (mysqli_num_rows($result1)) {
  while ($final=mysqli_fetch_assoc($result1)) {
 ?>
 <div style="padding: 0px; margin: 0px;">
    <div style="background-color: #0693cd; width: 20%; margin-left: 10px; border-radius: 8px; margin-top: 100px;padding-top: 10px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px;">
         <h5 style="width: 100%; margin-top: -10px;"><?php echo $final['emailid'];?></h5>
    </div>
    <p style="margin-left: 10px;"><?php echo htmlspecialchars_decode($final['comment_video']);  $time=time()-$final['comment_time'];$minute=round($time/60);if($minute<=60){ echo " ".$minute." Minute ago";} else if($minute>60 && $minute<=1440){$hours=round($minute/60);echo " ".$hours." Hours ago"; }?></p>
 </div>
 <?php     
  }
  }
        }		
	}
	else {
		echo "plsese enter some comment in comment box.";
	}
}
?>