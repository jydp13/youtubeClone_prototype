 <?php
 session_start();
 include_once('../mysql.php');
  $sql1 = "SELECT*FROM video WHERE category='{$_GET['c']}' OR sub_category='{$_GET['sc']}' AND filename != '{$_SESSION['filename']}'";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result))
   {
?>
<!--<div style="float: right; background-color: white; border-radius: 8px;margin-top: 15px; ">-->
<?php
     while($row=mysqli_fetch_assoc($result))
      {
        if ($video != $row['filename']) 
        {
?>
<a href="?watch=true&video=<?php echo explode('.',$row['filename'])[0]; ?>&category=<?php echo $row['category'];?>&subcategory=<?php echo $row['sub_category'];?>"><img src="thumbnails/<?php echo $row['thumbnail'];?>" alt="" width="350" height="200" style="border-radius: 8px;"></img><br><h5 style="color: blue;margin-left: 18px; "><?php echo $row['title'];?></h5></a>

<?php
        }
      }
?>
<!--</div>-->
<?php 
}


?>
<?php /*
if (isset($_GET['c'])) {?>
<div style="background-color: blue; height: 150px;"></div><br>
<?php }*/?>