<?php
   include("../mysql.php");
    $visit_date=date('Y-m-d');
     $country=$_SESSION['country'];
   if($country!="unknown"){
     $check="SELECT * FROM visitor_country WHERE country='{$country}' AND visit_date='{$visit_date}'";
     $data=$conn->query($check);
     if(mysqli_num_rows($data)==0){
       $insert="INSERT INTO visitor_country(visit_count,country,visit_date) VALUES(1,'{$country}','$visit_date')";
       $conn->query($insert);  
     }
     else if(mysqli_num_rows($data)>0){
      $row=mysqli_fetch_assoc($data);
      $count=++$row['visit_count'];
      $update="UPDATE visitor_country SET visit_count='$count' WHERE country='{$country}' AND visit_date='{$visit_date}'";
      $conn->query($update);
     }
    
   }
   else if($country=="unknown"){
     $c="NULL";
     $check="SELECT * FROM visitor_country WHERE country='{$c}' AND visit_date='{$visit_date}'";
     $data=$conn->query($check);
     if(mysqli_num_rows($data)==0){
       $insert="INSERT INTO visitor_country(visit_count,country,visit_date) VALUES(1,'{$c}','$visit_date')";
       $conn->query($insert);  
     }
     else if(mysqli_num_rows($data)>0){
      $row=mysqli_fetch_assoc($data);
      $count=++$row['visit_count'];
      $update="UPDATE visitor_country SET visit_count='$count' WHERE country='{$c}' AND visit_date='{$visit_date}'";
      $conn->query($update);
     }  
   
   }
   $conn->close();
?>