<?php
  session_start();
  $no_of_col=5;
  $sql1 = "SELECT*FROM video WHERE emailid='{$_SESSION['emailid']}'";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result))
   {
    $no=1;
?>
 <div id="r">
<?php 
if ($_GET['state']=="1") {
           echo '<p align="center" style="color: red;margin:auto;">Video successfully deleted.</p>';
       }
?>
 <br>
   <form action="del_multi.php" method="post">
  <table  cellpadding="10" style="border-collapse: collapse;" class="bodytable">
    <tr>
    
<?php
      $test=1;
     while($row=mysqli_fetch_assoc($result))
      {
       
        if($no<=$no_of_col)
              { 
?>
 <td>
      <a href="watch.php?video=<?php echo explode(".", $row['filename'])[0]; ?>&usertype=admin"><img src="thumbnails/<?php echo $row['thumbnail']; ?>" alt="" width="190" height="150" style="border-radius: 8px;"></img></a><br>
      <table style="border-collapse: collapse;margin-top:0px;">
        <tr >
          <td style="padding: 1px;margin-top:0px;">
            <p style="color: blue;"><?php echo $row['title'];?></p>
          </td>
          <td align="right" style="padding: 0px;margin-top:0px;">
            <h6 style="color: #C1B7B5;"><?php echo $row['upload_date'];?></h6>
          </td>
          </tr>
          <tr>
         
            <td><input type="checkbox" name="checkbox<?php echo $test;?>" value="<?php echo $row['filename'];?>" onchange="show()" id="test"></td>
               
           
          </tr>
      </table>
  </td>
<?php
     ++$no;
              }  
               if($no>$no_of_col)
             {
              include('body3.php');
              $no=1;
             }
            ++$test;
     }
?> 
   <td>
   <input type="submit" id="del" style="display: none;">
   </td>  
    
                </tr>
   </table>
   </form>
   </div>
<?php
   }
   else
   {
       if ($_GET['state']=="1") {
           echo '<div id="r"><p align="center" style="color: red;margin:auto;">Video successfully deleted.</p><p align="center" style="color: red;margin:auto;">You do not have any video left in your account</p></div>';
       }
       else{
        echo '<div id="r"><p align="center" style="color: red;margin:auto;">You do not have any video</p></div>';
       }
               
   }
 $conn->close();
?>
 
