<?php
  show("edu_sub_category");
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
<?php
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
  $sql1 = "SELECT*FROM video WHERE category='educational'and sub_category='{$arr}'";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result))
   {
    while($row=mysqli_fetch_assoc($result))
      {
       echo $row['filename']."\n";
       echo $row['size']."\n";
       echo $row['title']."\n";
       echo $row['discription']."\n";
       echo $row['upload_directory']."\n";
       $_SERVER['video']=$row['filename'];
?>
<td>
 <a href="watch.php?video=<?php echo $row['filename'] ?>"><img src="image/test.png" alt="" width="200" height="200"></img></a>
</td>
<?php
     }
   }
  else
   {
     echo "No video availalbe in this category";
   }                 
 $conn->close();
?>

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
