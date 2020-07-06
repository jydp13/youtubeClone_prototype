<?php
session_start();
  if(isset($_SESSION['emailid']))
{
  $servername="localhost";
  $username="root";
  $password="jaydeep";
  $name=$_FILES['filename']['name'];
  $size=$_FILES['filename']['size'];
  $tmp_name=$_FILES['filename']['tmp_name'];
/*  $kb=1024;
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
$_SESSION['time']=0;
  $_SESSION['speed']=round($kb / $deltat,1);
  $_SESSION['fileupload_size']=filesize($_FILES['filename']['tmp_name']);
  */
  $temp_newname_thumbnail=round(microtime(true)) . '.png';
  $location='uploads/';
  $location2='../original_video/';
  $email=$_SESSION['emailid'];
  $temp = explode(".", $_FILES["filename"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $video_allowed =  array('mp4','avi' ,'mkv');
  $video_ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
  if(!in_array($video_ext,$video_allowed)){
   //header("Location: http://you13.com?error=videoerror");
    echo "Video Format Not Suported";
  }
 else
  {
     $conn = new mysqli($servername,$username,$password);
     if($conn->connect_error)
         {
           echo "connection fail";
           die("connection failed".$conn->connect_error);
         }
     if(!empty($name)&&!empty($size)&&!empty($location)&&!empty($email))
        {
          $sql = "USE share";
          if($conn->query($sql))
           {
             $sql1 = "INSERT INTO video(filename,size,upload_directory,upload_date,emailid,views,thumbnail)".
                   "VALUES('$newfilename','$size','$location',CURDATE(),'$email','0','$temp_newname_thumbnail')";
                $result1=$conn->query($sql1);
                if($result1==FALSE){
                     mysqli_rollback($conn);
                 }
                else{
                  mysqli_commit($conn);
                  $conn->close();
                  $_SESSION['file_name']=$newfilename;
                   if(move_uploaded_file($tmp_name,$location2.$newfilename))
                         { 
                            $location1='uploads/144*320/';
                            $location3='uploads/640*320/';
                            $video_dir="../original_video/".$newfilename;
                            $thumbnail_dir="thumbnails/".$temp_newname_thumbnail;
                            $time=5;// no of second from where it will extract frame
                             for($i=1;$i<=1;$i++){
                            $command="ffmpeg -ss 00:00:".$time." -i ".$video_dir." -vf scale=400:-1 -vframes 1 ".$thumbnail_dir;
                            $command2="ffmpeg -i ".$location2.$newfilename." -s 144x320 -c:a copy ".$location1.$newfilename;
                            $command3="ffmpeg -i ".$location2.$newfilename." -s 640x320 -c:a copy ".$location3.$newfilename;
                            exec($command);
                            exec($command2);
                           exec($command3);
                         }
                          /*
                          echo "<p align='center'>Video Successfully Uploaded</p>
                            <p align='center'>Please provide bellow information about your video otherwise your video will not be visible to anyone </p>";
                          */
                       
                        header("Location: videoupload.php?status=true");
                      }
                    else{
                       echo "<p align='center'>Video can not be  uploaded due to some error</p>";
                     } 
                }   
           }
        else
          {
            echo "database not selected";
          }
       }
     }
 }
?>
