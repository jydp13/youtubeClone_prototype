 <?php
  $sql1 = "SELECT*FROM video WHERE category='{$_GET['category']}' or sub_category='{$_GET['subcategory']}'";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result))
   {
?>
<div style="float: right; background-color: white; border-radius: 8px;margin-top: 15px; ">
<?php
     while($row=mysqli_fetch_assoc($result))
      {
        if ($video != $row['filename']) 
        {
?>
<a href="?watch=true&video=<?php echo $row['filename']; ?>&category=<?php echo $row['category'];?>&subcategory=<?php echo $row['sub_category'];?>"><img src="thumbnails/<?php echo $row['thumbnail'];?>" alt="" width="250" height="130" style="border-radius: 8px; margin-left: 18px;padding-top: 5px; float: right; "></img><br><p style="color: blue;margin-left: 18px; float: right;"><?php echo $row['title'];?></p></a>

<?php
        }
      }
?>
</div>
<?php 
}
?>