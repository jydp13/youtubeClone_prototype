<?php 
$servername="localhost";
     $username="root";
     $password="jaydeep";
     $conn=new mysqli($servername,$username,$password);
     if($conn->connect_error){
     die("connection failed" .$conn->connect_error);
     }
     $sql = "USE share";
      if($conn->query($sql))
      {
        if(isset($_SESSION['video']))
          { 
            $sql2="SELECT * FROM video WHERE filename='{$_SESSION['video']}'"; 
            $video=$_SESSION['video'];
          }
        else
          { 
          	 $video=$_GET['video'].'.mp4';
            $sql2="SELECT * FROM video WHERE filename='{$video}'"; 
           
          }
          $likes=$conn->query($sql2);
          if($likes){
          	 $test=mysqli_fetch_assoc($likes);
          	 $new_likes_count=++$test['likes'];
          	  $sql3="UPDATE video SET likes='$new_likes_count' WHERE filename='{$video}'";
              if($conn->query($sql3)){
              	 if ($test['likes']>0){echo $test['likes']." Likes";} else { echo "0 Likes";}
                 }
            }
       }
 ?>