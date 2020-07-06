<?php
   if(!isset($_COOKIE['user']))
   {
     include("../mysql.php");
     $sql1 = "SELECT*FROM visitor ORDER BY visit_date DESC LIMIT 1";
     $result=$conn->query($sql1);
     if(mysqli_num_rows($result)>=0)
      {
          $row=mysqli_fetch_assoc($result);
          
          $current_date=date('Y-m-d');
          if($current_date==$row['visit_date'])
           {
            $visitor_count=++$row['count'];
            $sql3 = "UPDATE visitor SET count='$visitor_count' WHERE visit_date='{$row['visit_date']}'";
            $conn->query($sql3);
           }
           elseif ($row['visit_date']<$current_date) {
             $sql3="INSERT INTO visitor(count,visit_date) VALUES(1,'$current_date')";
             $conn->query($sql3);
           }
      }
    }
?>
