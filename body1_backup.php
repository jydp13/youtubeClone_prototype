<?php
 session_start();
 function show($arr_name){

//array which contain title of sub category of educatonal, entertainment,live category
    $a=array(
              "edu_sub_category" => array("Animation", "Drawing", "Coding", "Science & Tech", "History", "Economics"),
              "enter_sub_category" => array("Music", "Movies", "Sport", "Vlog", "Shows", "Events"),
              "live_sub_category" => array("News","Event","Show"),
              "home" =>array("populer","recent")
            );


    $arr=$a[$arr_name];
    foreach($arr as $arr){
?>         
<div style="background-color:blue">
  <table bgcolor="red">
    <tr>
      <td><?php echo $arr ;?></td>
    </tr>
    <tr>


fatch video file name and thumbnail from database and then access file from directory
--------------------------------------------------------------------------------------------------------------------------------------------------

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
 
---------------------------------------------------------------------------------------------------------------------------------------------------





    </tr>
    <tr> 
      <td align="center"><img src="icon/expand.png" width="50" height="50"></img></td>
    </tr>
   </table>
 </div>
<?php
       } 
 }
?> 

