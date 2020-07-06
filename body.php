<?php
  function show($arr_name){
  $category=" ";
//array which contain title of sub category of educatonal, entertainment,live category
    $a=array(
              "edu_sub_category" => array("Animation", "Drawing", "Coding", "Science & Tech", "History", "Economics"),
              "enter_sub_category" => array("Music", "Movies", "Sport", "Vlog", "Shows", "Events"),
              "live_sub_category" => array("News","Event","Show"),
              "home" =>array("Populer","Recent Uploads","Most Viewed","Most Liked"),
              "clips" =>array("Populer","Recent Uploads","Most Viewed","Most Liked")
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
          else if($arr_name=="clips")
          {
            $category="Clips";
          }

    
    $arr=$a[$arr_name];
    $nothing=0;
    $no_of_col=5;//show how many video show in one row
    $no_of_sub_category=0;
    include_once("../mysql.php");
    foreach($arr as $arr)
    {
      $min_populer_video=10;
      $min_liked_video=10;
      $min_viwed_video=10;
      $check=0;
   //home content 
  if($category=="Home"){
    if($arr=="Populer")
    {
      
    

      $sql1 = "SELECT*FROM video WHERE title!='NULL' AND discription!='NULL' AND category!='NULL'AND sub_category!='NULL' AND thumbnail!='NULL' AND filename!='NULL' ORDER BY likes DESC,views DESC LIMIT 10";
      $result=$conn->query($sql1);
        if(mysqli_num_rows($result)>$min_populer_video)
          {
            $no=mysqli_num_rows($result);
            include('body1.php');
            $no=1;
            while($row=mysqli_fetch_assoc($result))
            {
             if($no<=$no_of_col)
              { 
              	include('body2.php');
               ++$no;
              }
             if($no>$no_of_col)
             {
               include('body3.php');
               $no=1;
             }
          }
          include('body4.php');
        }



    }
    elseif ($arr=="Recent Uploads") {
      

     
      $sql1 = "SELECT*FROM video WHERE title!='NULL' AND discription!='NULL' AND category!='NULL'AND sub_category!='NULL' AND thumbnail!='NULL' ORDER BY upload_date DESC LIMIT 10";
      $result=$conn->query($sql1);
        if(mysqli_num_rows($result))
          {
            $no=mysqli_num_rows($result);
            include('body1.php');
            $no=1;
            while($row=mysqli_fetch_assoc($result))
            {
             if($no<=$no_of_col)
              {
               include('body2.php'); 
               ++$no;
              }
             if($no>$no_of_col)
             {
              include('body3.php');
               $no=1;
             }
          }
      include('body4.php');
        }



    }
    else if($arr=="Most Viewed"){
  


      $sql1 = "SELECT*FROM video WHERE title!='NULL' AND discription!='NULL' AND category!='NULL'AND sub_category!='NULL' AND thumbnail!='NULL' AND filename!='NULL' ORDER BY views DESC LIMIT 10";
      $result=$conn->query($sql1);
        if(mysqli_num_rows($result)>$min_viwed_video)
          {
            $no=mysqli_num_rows($result);
            include('body1.php');
            $no=1;
            while($row=mysqli_fetch_assoc($result))
            {
             if($no<=$no_of_col)
              { 
               include('body2.php');
               ++$no;
              }
             if($no>$no_of_col)
             {
              include('body3.php');
               $no=1;
             }
          }
          include('body4.php');
        }



    }
    else if($arr=="Most Liked"){
      $sql1 = "SELECT*FROM video WHERE title!='NULL' AND discription!='NULL' AND category!='NULL'AND sub_category!='NULL' AND thumbnail!='NULL' AND filename!='NULL' ORDER BY likes DESC LIMIT 10";
      $result=$conn->query($sql1);
        if(mysqli_num_rows($result)>$min_liked_video)
          {
            $no=mysqli_num_rows($result);
            include('body1.php');
            $no=1;
            while($row=mysqli_fetch_assoc($result))
             {
              if($no<=$no_of_col)
               { 
                include('body2.php');
                ++$no;
               }
              if($no>$no_of_col)
               {
                include('body3.php');
                $no=1;
               }
             }
           include('body4.php');
          }
 
    }
  }





  else{
  
  $sql1 = "SELECT*FROM video WHERE category='{$category}' and sub_category='{$arr}' LIMIT 10";
  $result=$conn->query($sql1);
  if(mysqli_num_rows($result)>0)
   {
    $no=mysqli_num_rows($result);
    include('body1.php');
    $no=1;
    while($row=mysqli_fetch_assoc($result))
      {
        if($no<=$no_of_col)
          {
            include('body2.php');        
            ++$no;
          }
          if($no>$no_of_col)
          {
            include('body3.php');
            $no=1;
          }
     }
include('body4.php');
 $no_of_sub_category++;
   }
}
   
   }
    echo $no_of_sub_category;
    $conn->close();
 }
?> 
