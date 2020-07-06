<?php
     $no_of_col=5;
     $no=1;
     $servername="localhost";
     $username="root";
     $password="jaydeep";
     $conn=new mysqli($servername,$username,$password);
     if($conn->connect_error){
     die("connection failed" .$conn->connect_error);
     }
     $sql1 = "USE share";
     $conn->query($sql1);
     $sql2="SELECT*FROM video WHERE sub_category='{$_GET["sub_category"]}' ORDER BY likes DESC LIMIT 15";
     $result=$conn->query($sql2);
     if(mysqli_num_rows($result))
       {
?>
        <div id="body"><!--style="padding: 0px;margin:10px 5px 15px 70px;"-->
            <table  cellpadding="10" style="padding: 0px;margin:0px;" >
             <tr>
               <td><a href="?show=<?php echo $_GET['show'];?>&sub_category=<?php echo $_GET['sub_category'];?>"><?php echo $_GET['sub_category'];?></a></td>
             </tr>
            <tr>
<?php  
        while($row=mysqli_fetch_assoc($result))
          {
            if($no<=$no_of_col)
            {
?>     
           <td>
      <a href="watch.php?video=<?php echo explode('.', $row['filename'])[0]; ?>&category=<?php echo $row['category']; ?>&subcategory=<?php echo $row['sub_category']; ?>"><img src="thumbnails/<?php echo $row['thumbnail']; ?>" alt="" width="190" height="150" style="border-radius: 8px;" id="table"></img>
        <p style="color: blue;"><?php echo $row['title'];?></p></a>
        <h6 style="color: #C1B7B5;"><?php echo $row['upload_date'];?></h6>
     </td>


<?php
          ++$no;
          }
          if($no>$no_of_col)
          {
            echo "</tr><tr>";
            $no=1;
          }
        }

 ?>
  </tr>
   </table>
   </div>
 <?php         
       }
       else
       {
        echo "not found";
       }
?>
