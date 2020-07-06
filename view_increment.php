<?php
  //--------------------------incermenting views-------------------------------------------
  $new_view_count=++$test['views'];
  $sql3="UPDATE video SET views='$new_view_count' WHERE filename='$video'";
  $conn->query($sql3);
  //----------------------------------------------------------------------------------------
?>