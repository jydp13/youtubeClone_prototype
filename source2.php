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
     $current_date=date("Y-m-d");
     $sql="SELECT * FROM source WHERE url='{$_SESSION['source']}' AND visit_date='{$current_date}' AND cookie_value='{$_COOKIE['user']}' AND service='{$_SESSION['service']}'";
     $result=$conn->query($sql);
     if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
          $new_click_count=++$row['click_count'];
          $sql="UPDATE source SET click_count='$new_click_count' WHERE url='{$_SESSION['source']}' AND visit_date='{$current_date}' AND cookie_value='{$_COOKIE['user']}'";
      $conn->query($sql);
      $conn->close();

     }
     else{
            $sql="INSERT INTO source(url,country,cookie_value,visit_date,click_count,service) VALUES('{$_SESSION['source']}','{$_SESSION['country']}','{$_COOKIE['user']}',CURDATE(),1,'{$_SESSION['service']}')";
            $conn->query($sql);
          $conn->close();
     }
//echo $_SESSION['source'];
//echo $_SESSION['country'];
//echo $_COOKIE['user'];

?>