<?php
session_start();
 $_SESSION['count']=0;


 //-------------------------------------video comment inserting and showing----------------------------------- 
    if($_GET['Comment']=="true" && $_GET['video']==explode(".", $video)[0] && $_GET['category']==$test['category'] && $_GET['subcategory']==$test['sub_category']){
?>
<hr>
<script type="text/javascript">
  function comment_check(){
    var comment=document.getElementById('c').value;
    if (comment=='') {
      alert("Please Enter Comment.");
    }
    else{
        var hr = new XMLHttpRequest();
    var url = "comment.php";
    var comment=  document.getElementById("c").value;
     var vars = "comment="+comment+"&filename="+"<?php echo $video;?>";
    hr.open("POST", url, false);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
      document.getElementById("comments").innerHTML = return_data;
      }
    }
    hr.send(vars); 
    }
  }

   
    


</script>
<div id="comm">
   <p>Post Comment:</p>
     <textarea id="c" value="" name="comment" col="50" row="50"  style="resize: none;width: 73%; height: 50px;border-radius: 8px; float: left;"></textarea>
   <div id="post" onclick="comment_check()">
     <p style="margin-left: 95px;">Post</p>
   </div>
</div>
<?php
 }
 else{?>
  <hr>
  <a href="http://you13.com?Comment=true&video=<?php echo explode(".", $video)[0];?>&category=<?php echo $test['category'];?>&subcategory=<?php echo $test['sub_category'];?>">Comment</a>
  <?php }

//--------------------------------------------------------------------------------------------------------------
?>
<div id="comments" style="padding-top: 30px; margin-top: 40px;">
<?php
  $comments="SELECT * FROM comments WHERE filename='$video' ORDER BY comment_time DESC LIMIT 0";
  $result1=$conn->query($comments);
  if (mysqli_num_rows($result1)) {
  while ($final=mysqli_fetch_assoc($result1)) {
 ?>
 <div style="padding-top:30px;padding-left: 10px;">
          <div style="background-color: #0693cd; width: 20%; margin-left: 10px; border-radius: 8px; margin-top: 100px;padding-top: 10px; padding-bottom: 0px; padding-right: 0px; padding-left: 0px;">
         <h5 style="width: 100%; margin-top: -10px;letter-spacing: 3px;"><?php echo $final['emailid'];?></h5>
         </div>
    <p style="margin-left: 10px;"><?php echo htmlspecialchars_decode($final['comment_video']);  $time=time()-$final['comment_time'];$minute=round($time/60);if($minute<=60){ echo " ".$minute." Minute ago";} else if($minute>60 && $minute<=1440){$hours=round($minute/60);echo " ".$hours." Hours ago"; }?></p>
 </div>
 <?php     
  }
  }?>
</div>