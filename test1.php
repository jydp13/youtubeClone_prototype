
     <?php
   $path="/var/www/html/youtube/video/";
   $file=scandir($path);
   foreach($file as $file)
    {
      
 ?>  
     <td><a href="watch.php?video=<?php echo substr($file,0,strpos($file,'.')).'.mp4';?>"><img src="image/<?php echo substr($file,0,strpos($file,'.')).'.png'; ?>" alt="" width="200" height="200"></img></a></td>
  <?php
      
     }
 ?>
