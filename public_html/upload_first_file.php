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
  $location='uploads/';
  $a=$_POST["title"];
  $b=$_POST["discription"];
  $c=$_POST["category"];
  if ($_POST['category']=="Educational") {
   $sub_c=$_POST['sub_category1'];
}
else if($_POST['category']=="Entertainment"){
 $sub_c=$_POST['sub_category2'];
}
  
  $email=$_SESSION['emailid'];
  $temp = explode(".", $_FILES["filename"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
//thumbnail
  $thumbnail_tmp_name=$_FILES['thumbnail']['tmp_name'];
  $thumbnail_location='thumbnails/';
  $thumbnail_temp=explode(".", $_FILES["thumbnail"]["name"]);
  $temp_newname_thumbnail=round(microtime(true)) . '.' . end($thumbnail_temp);
  $thumbnail_ext=end((explode(".",$thumbnail_temp)));
  $thumbnail=$temp_newname_thumbnail.$thumbnail_ext;

  $image_allowed =  array('png','jpeg','jpg');
  $video_allowed =  array('mp4','avi' ,'mkv');
  $image_ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
  $video_ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
  if (!in_array($image_ext,$image_allowed) && !in_array($video_ext,$video_allowed)) {
   header("Location: http://you13.com?category=upload&type=dualerror");

  }
  else if(!in_array($image_ext,$image_allowed) ) {
    header("Location: http://you13.com?category=upload&type=imageerror");
  }
  else if(!in_array($video_ext,$video_allowed)){
   header("Location: http://you13.com?category=upload&type=videoerror");
  }
  else
  {
//--------------------------------------------------------------------------------------
   if(isset($name)&&isset($thumbnail))
    {
      if(!empty($name)&&!empty($thumbnail)) 
        { 
           if(move_uploaded_file($tmp_name,$location.$newfilename)&&move_uploaded_file($thumbnail_tmp_name,$thumbnail_location.$thumbnail))
               {
                /* $video_dir="uploads/".$newfilename;
                 $thumbnail_dir="thumbnails/".strstr($temp_newname_thumbnail,'.',true);
                 $time=15;//second
                 for($i=1;$i<=3;$i++){
                   $command="ffmpeg -ss 00:00:".$time*$i." -i ".$video_dir." -vf scale=300:-1 -vframes 1 ".$thumbnail_dir.$i.".png";
                   exec($command);
                  }
                  */
                header("Location: http://you13.com?category=account&newup=newupload");
               } 
        }
      else
        {
           echo 'plese choose file';
        }
    }
  $conn = new mysqli($servername,$username,$password);
     if($conn->connect_error)
         {
           echo "connection fail";
           die("connection failed".$conn->connect_error);
         }
  if(!empty($name)&&!empty($size)&&!empty($location)&&!empty($a)&&!empty($b)&&!empty($c)&&!empty($sub_c)&&!empty($email)&&!empty($thumbnail))
   {
     $sql = "USE share";
     if($conn->query($sql))
        {
           $sql1 = "INSERT INTO video(filename,size,title,discription,category,sub_category,upload_directory,upload_date,emailid,thumbnail,views)".
                   "VALUES('$newfilename','$size','$a','$b','$c','$sub_c','$location',CURDATE(),'$email','$thumbnail','0')";
           if($conn->query($sql1))
              {
               $conn->close();
              }
           else
              {
               echo "not inserted";
              }
         }
     else
         {
           echo "database not selected";
         }
   }
  else
   {
    echo "please fill all field<br>";
   }
 }
}
else
{
 header("Location: http://you13.com");
  }                  
?>
