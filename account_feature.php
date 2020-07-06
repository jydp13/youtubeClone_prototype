<?php
  if ($_GET['usertype']=="admin") {
  ?>
  <tr>
   <td>
     <a href="delete.php?video_delete=<?php echo $video;?>&t_nail=<?php echo $test['thumbnail'];?>">Delete Video</a>
   </td>
<?php
  }
?> 