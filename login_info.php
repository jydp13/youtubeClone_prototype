<?php
/*  session_start();
  $servername="localhost";
     $username="root";
     $password="jaydeep";
     $conn=new mysqli($servername,$username,$password);
     if($conn->connect_error){
     die("connection failed" .$conn->connect_error);
     }
     $sql = "USE share";
     $conn->query($sql);*/
  // $date=date("Y-m-d");
  // $b=$_SESSION['browser']." ".$_SESSION['version'];
  // $s=$_SESSION['width']."*".$_SESSION['height'];
  // $sql1="SELECT * FROM login_info WHERE emailid='{$_SESSION['emailid']}' AND country='{$_SESSION['country']}' AND visit_date='{$date}' AND operating_system='{$_SESSION['os']}' AND browser='{$b}' AND screen_size='{$s}' AND cookie_value='{$_COOKIE['user']}' AND device='{$_SESSION['device']}'";
  // $result=$conn->query($sql1);
  // if(mysqli_num_rows($result)>0)
  //  {
  //  	 $row=mysqli_fetch_assoc($result);
  //    $visit_count=++$row['visit_count'];
  //  	 $sql2="UPDATE login_info SET visit_count='$visit_count' WHERE emailid='{$_SESSION['emailid']}' AND country='{$_SESSION['country']}' AND visit_date='{$date}' AND operating_system='{$_SESSION['os']}' AND browser='{$b}' AND screen_size='{$s}' AND cookie_value='{$_COOKIE['user']}' AND device='{$_SESSION['device']}'";
  //  	 $conn->query($sql2);
  //   }
  //   else{
  //        $sql2="INSERT INTO login_info(visit_count,emailid,country,visit_date,operating_system,browser,screen_size,cookie_value,device) 
  //                              VALUES (1,'{$_SESSION['emailid']}','{$_SESSION['country']}','{$date}','{$_SESSION['os']}','{$b}','{$s}','{$_COOKIE['user']}','{$_SESSION['device']}')";  
  //             $conn->query($sql2);	
  //   }
  
 
?>
