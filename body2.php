       <td>
      <a href="?watch=true&video=<?php echo explode(".", $row['filename'])[0];?>&category=<?php echo $row['category']; ?>&subcategory=<?php echo $row['sub_category']; ?>"><img src="thumbnails/<?php echo $row['thumbnail']; ?>" alt="" width="190" height="150" style="border-radius: 8px;" id="table"></img>
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