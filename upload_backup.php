<?php
  session_start();
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
  $sub_c=$_POST["sub_category"];
  $email=$_SESSION['emailid'];
  $temp = explode(".", $_FILES["file"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $ext = end((explode(".", $name)));
  $newname=$newfilename.$ext;
   if(isset($name))
    {
      if(!empty($name)) 
        {
           if(move_uploaded_file($tmp_name,$location.$newname))
               {
                 $check=1;
                 echo "uploaded";
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
  if(!empty($name)&&!empty($size)&&!empty($location)&&!empty($a)&&!empty($b)&&!empty($c)&&!empty($sub_c)&&!empty($email))
   {
     $sql = "USE share";
     if($conn->query($sql))
        {
           $sql1 = "INSERT INTO video(filename,size,title,discription,category,sub_category,upload_directory,upload_date,emailid)".
                   "VALUES('$newname','$size','$a','$b','$c','$sub_c','$location',CURDATE(),'$email')";
           if($conn->query($sql1))
              {
               if($check==1)
                {
                
                 echo "inserted";
                }
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
                  
?>

