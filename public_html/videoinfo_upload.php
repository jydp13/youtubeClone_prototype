<?php
  session_start();
  if(isset($_SESSION['emailid']))
{
	 $servername="localhost";
  $username="root";
  $password="jaydeep";
   $a=$_POST["title"];
  $b=$_POST["discription"];
  $visibility=$_POST['visibility'];
  if ($_SESSION['clip']=='true') {
    $c='Clips';
    unset($_SESSION['clip']);
  }
  else{
   $c=$_POST["category"];
  }
  if ($_POST['category']=="Educational") {
   $sub_c=$_POST['sub_category1'];
}
else if($_POST['category']=="Entertainment"){
 $sub_c=$_POST['sub_category2'];
}

$email=$_SESSION['emailid'];
$file_name=$_SESSION['filename'];
unset($_SESSION['filename']);
//thumbnail
  $thumbnail_tmp_name=$_FILES['thumbnail']['tmp_name'];
  $thumbnail_location='thumbnails/';
  $thumbnail_temp=explode(".", $_FILES["thumbnail"]["name"]);
  $temp_newname_thumbnail=round(microtime(true)) . '.' . end($thumbnail_temp);
  $thumbnail_ext=end((explode(".",$thumbnail_temp)));
  $thumbnail=$temp_newname_thumbnail.$thumbnail_ext;
  $image_allowed =  array('png','jpeg','jpg');
  $image_ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
 //echo $thumbnail_tmp_name;
  if(!in_array($image_ext,$image_allowed) ) {
    echo "image not suported";
    //echo $thumbnail_ext;
    //echo $image_ext;
  }
   else
  {
  if(isset($thumbnail))
    {
      if(!empty($thumbnail)) 
        { 
           if(move_uploaded_file($thumbnail_tmp_name,$thumbnail_location.$thumbnail))
               {
                /* $video_dir="uploads/".$newfilename;
                 $thumbnail_dir="thumbnails/".strstr($temp_newname_thumbnail,'.',true);
                 $time=15;//second
                 for($i=1;$i<=3;$i++){
                   $command="ffmpeg -ss 00:00:".$time*$i." -i ".$video_dir." -vf scale=300:-1 -vframes 1 ".$thumbnail_dir.$i.".png";
                   exec($command);
                  }
                  */
                  $default_thumbnail='thumbnails/'.explode('.', $file_name)[0].'.png';
                  unlink($default_thumbnail);
                header("Location: videoinfo.php");
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
     if(!empty($a)&&!empty($b)&&!empty($c)&&!empty($sub_c)&&!empty($email)&&!empty($thumbnail))
   {
     $sql = "USE share";
     if($conn->query($sql))
        {
        	$sql1="UPDATE video SET title='$a',discription='$b',category='$c',sub_category='$sub_c',thumbnail='$thumbnail',visibility='$visibility' WHERE emailid='$email' AND filename='$file_name'";
        	if($conn->query($sql1))
              {
               $conn->close();
               $location2="../original_video/";
               $location3='uploads/640*320/';
               $command3="ffmpeg -i ".$location2.$file_name." -s 640x320 -c:a copy ".$location3.$file_name;
               exec($command3);
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
else{
header("Location: http://you13.com?category=account");
}
?>
