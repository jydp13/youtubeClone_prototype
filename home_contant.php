<?php
     
      $sql1 = "SELECT*FROM video ORDER BY upload_date DESC LIMIT 10";
      $result=$conn->query($sql1);
        if(mysqli_num_rows($result))
          {
            $no=mysqli_num_rows($result);
  ?>
            <div id="contant" style="padding: 0px;margin:10px 5px 15px 70px;">
  <table  cellpadding="10" style="padding: 0px;margin:0px 0px 0px 80px;" >
    <tr>
      <td><a href="?show=<?php echo $category;?>&sub_category=<?php echo $arr;?>"><?php echo $arr;?></a></td>
    </tr>
    <tr>
    <?php
            $no=1;
            while($row=mysqli_fetch_assoc($result))
            {
             if($no<=$no_of_col)
              { 
    ?>
               <td>
      <a href="index.php?watch=true&video=<?php echo $row['filename'];?>&category=<?php echo $row['category']; ?>&subcategory=<?php echo $row['sub_category']; ?>"><img src="thumbnails/<?php echo $row['thumbnail']; ?>" alt="" width="190" height="150" style="border-radius: 8px;" id="table"></img>
        <p style="color: blue; padding: 0px; margin: 0px;"><?php echo $row['title'];?></p></a>
    <h6 style="color: #C1B7B5;float: right; padding: 0px; margin: 2px;"><?php 
                                  $current_date=date("Y-m-d");$time=strtotime($current_date)-strtotime($row['upload_date']); 
                                  $minite=$time/60;
                                  $hour=$minite/60; 
                                  if ($hour==24) {
                                     echo $hour." Hours ago";
                                   }
                                  else if ($hour>24) {
                                      $days=$time/60/60/24;
                                      echo $days." Days ago"; 
                                   }
                                  ?></h6>
        <h6 style="color: blue; float: left;padding: 0px; margin: 2px;"><?php echo $row['views']." Views";?></h6>
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
 $conn->close();
 ?>