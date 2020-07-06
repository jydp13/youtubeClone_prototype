<?php
session_start();
 $servername="localhost";
  $username="root";
  $password="jaydeep";
  $conn = new mysqli($servername,$username,$password);
  if($conn->connect_error)
   {
    die("connection failed".$conn->connect_error);
   }
  $sql = "USE share";
  $conn->query($sql);
  $sql1 = "SELECT*FROM video WHERE visibility='Public' AND category LIKE '%{$_SESSION['search']}%' or sub_category LIKE '%{$_SESSION['search']}%' or discription LIKE '%{$_SESSION['search']}%' or title LIKE '%{$_SESSION['search']}%' or discription LIKE '%{$_SESSION['search']}%' LIMIT 10";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result))
   {
 ?>
   <div id="body" >
   <div>
   	<table>
   	

 <?php
   	while($row=mysqli_fetch_assoc($result))
      {
 ?>
  <tr>
    <td>
      <a href="watch.php?video=<?php echo explode('.', $row['filename'])[0];?>&category=<?php echo $row['category']?>&subcategory=<?php echo $row['sub_category']?>">
       <img src="thumbnails/<?php echo $row['thumbnail'];?>" width="200" height="180" style="border-radius: 8px;"></img>
      </a>
    </td>
    <td>
       <table>
        <tr>
         <td><?php echo $row['title'];?></td>
        </tr>
        <tr>
          <td><?php echo $row['views']." Views";?></td>
        </tr>
        <tr>
          <td><?php echo $row['discription'];?></td>
        </tr>
        
      </table>
    </td>
  </tr>
 <?php      
      }
?>
  </table>
  </div>
  </div>
<?php
   }
   else
   {
?>
   <div id="body">
   	<?php echo "No result found for ".$_SESSION['search']; ?>
   </div>
<?php
   }
 $conn->close();
?>
