<?php
  function show($arr_name){
  $category=" ";
//array which contain title of sub category of educatonal, entertainment,live category
    $a=array(
              "edu_sub_category" => array("Animation", "Drawing", "Coding", "Science & Tech", "History", "Economics"),
              "enter_sub_category" => array("Music", "Movies", "Sport", "Vlog", "Shows", "Events"),
              "live_sub_category" => array("News","Event","Show"),
              "home" =>array("Populer","Recent")
            );
         if($arr_name=="edu_sub_category")
          {
            $category="Educational";
          } 
         else if($arr_name=="enter_sub_category")
          {
            $category='Entertainment';
          }
         else if($arr_name=="live_sub_category")
          {
            $category="Live";
          }
         else if($arr_name=="home")
          {
            $category="Home";
          }

    
    $arr=$a[$arr_name];
    $nothing=0;
    $no_of_col=5;//show how many video show in one row
    foreach($arr as $arr)
    {
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
  $sql1 = "SELECT*FROM video WHERE category='{$category}' and sub_category='{$arr}' LIMIT 10";
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
 
<?php
   }
 }
?> 
