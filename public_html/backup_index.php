
<?php
 session_start();
 //visitor counter--------------------------------------------------------------------
   if(!isset($_COOKIE['user']))
   {
     
     $servername="localhost";
     $username="root";
     $password="jaydeep";
     $conn=new mysqli($servername,$username,$password);
     if($conn->connect_error){
     die("connection failed" .$conn->connect_error);
     }
     $sql = "USE share";
     $id=round(microtime(true));
     $conn->query($sql);
     $sql1 = "SELECT*FROM visitor ORDER BY visit_date DESC LIMIT 1";
     $result=$conn->query($sql1);
     if(mysqli_num_rows($result)>=0)
      {
          $row=mysqli_fetch_assoc($result);
          setcookie("user",$id,time()+86400,"/");
          $current_date=date('Y-m-d');
          if($current_date==$row['visit_date'])
           {
            $visitor_count=++$row['count'];
            $sql3 = "UPDATE visitor SET count='$visitor_count' WHERE visit_date='{$row['visit_date']}'";
            $conn->query($sql3);
           }
           elseif ($row['visit_date']<$current_date) {
             $sql3="INSERT INTO visitor(count,visit_date) VALUES(1,'$current_date')";
             $conn->query($sql3);
           }
      }
    }
//----------------------------------------------------------------------------------------
  if(isset($_GET['category'])){
       $page=$_GET['category'];
     }
  else if(isset($_POST['emailid'])&&isset($_POST['password1']))
     {
       if(!empty($_POST['emailid']) && !empty($_POST['password1']))
         {
           include_once('../header.php');
           include_once('../signin.php');
           include_once('../footer.php');
         }
         else
         {
          $page="account";
         }
     }
  else{
     
    $page="index";
   }
   if (isset($_GET['search'])) {
     $page="search1";
   }
   if(!empty(isset($_GET['show'])))
   {
    $page="show";
   }
  // if(isset($_GET['su']))
  switch($page)
    {
         case 'index':
                include_once('../header.php');
                include_once('../body.php');
                show('home');
                include_once('../footer.php');
                break;
         case 'educational':
                include_once('../header.php');
                include_once('../body.php');
                show('edu_sub_category');
                include_once('../footer.php');
                break;
         case 'entertainment':
                include_once('../header.php');
                include_once('../body.php');
                show('enter_sub_category');
                include_once('../footer.php');
                break;
         case 'live':
                include_once('../header.php');
                include_once('../body.php');
                show('live_sub_category');
                include_once('../footer.php');
                break;
         case 'account':
                include_once('../header.php');
                if(isset($_GET['page'])=="signup"){
                   include_once('../signup.html');
                  }
                else if(isset($_SESSION['emailid']))
                 {
                   if(isset($_GET['newup'])=="newupload"){
                          include_once('../up.php');
                      }
                    else{
                   include_once('../account.php');
                    }
                  }
                  else if ($_GET['state']=="2") {
                      echo '<p align="center" style="color: red;">User already exist.Please try diffrent email address</p>';
                      include_once('../signup.html');
                  }
                  else if($_GET['state']=="3"){
                    echo '<p align="center" style="color: red;">Not a valid e-mail address or password</p>';
                    include_once('../signin.html');
                  }
                  else if($_GET['state']=="4"){
                    echo '<p align="center" style="color: red;">You are not ragistered.Please signup.</p>';
                    include_once('../signin.html');
                  }
                 else
                  {
                   include_once('../signin.html');
                 }
                include_once('../footer.php');
                break;
         case 'search':
                include_once('../header.php');
                include_once('../search.php');
                include_once('../footer.php');
                break;
         case 'upload':
                include_once('../header.php');
                if($_GET['type']=="videoerror")
                {   
                    $_SESSION['upload_error']=$_GET['type'];
                    include_once('../up.php');
                }
                else if($_GET['type']=="imageerror")
                {
                  $_SESSION['upload_error']=$_GET['type'];
                  include_once('../up.php');
                }
                else if ($_GET['type']=="dualerror") {
                  $_SESSION['upload_error']=$_GET['type'];
                  include_once('../up.php');
                }
                else
                {
                    include_once('../up.php');
                }
                include_once('../footer.php');
                break;
          case 'logout':
                include_once('../header.php');
                include_once('../logout.php');
                include_once('../footer.php');
                break;
           case 'myvideos':
                include_once('../header.php');
                if (isset($_GET['state'])=="1") {
                  include_once('../account_home_menu.php');
                  echo '<p align="center" style="color: white;">Video deleted successfully.</p>';
                  include_once('../myvideos.php');
                }
                else{
                include_once('../account_home_menu.php');
                include_once('../myvideos.php');
                }
                include_once('../footer.php');
               break;
           
        case 'search1':
                include_once('../header.php');
                if(!empty($_GET['search']))
                 {
                   $_SESSION['search']=$_GET['search'];
                  include_once('../search_result.php');
                 }
                 else
                 {
                  header("Location: http://you13.com");
                 }
                include_once('../footer.php');
                break;
       case 'show':
               include_once('../header.php');
               if ($_GET['show']=="Entertainment") 
               {
                if(!empty(isset($_GET['sub_category'])))
                 {
                   if($_GET['sub_category']=="Music")
                     {
                       include_once('../show_musics.php');
                     }
                    else if($_GET['sub_category']=="Movies")
                     {
                       include_once('../show_movies.php');
                     }
                    else if($_GET['sub_category']=="Sport")
                     {
                       include_once('../show_sports.php');
                     }
                     else if($_GET['sub_category']=="Vlog")
                     {
                       include_once('../show_vlogs.php');
                     }
                     else if($_GET['sub_category']=="Shows")
                     {
                       include_once('../show_shows.php');
                     }
                     else if($_GET['sub_category']=="Events")
                     {
                       include_once('../show_events.php');
                     }
                  }
               }
               else if ($_GET['show']=="Educational") 
               {
                 if(!empty(isset($_GET['sub_category'])))
                 {
                   if ($_GET['sub_category']=="Animation") 
                   {
                     include_once('../show_animation.php');  
                   }
                   else if ($_GET['sub_category']=="Coding") 
                   {
                     include_once('../show_coding.php');  
                   }
                   else if ($_GET['sub_category']=="Drawing") 
                   {
                     include_once('../show_drawing.php');  
                   }
                   else if ($_GET['sub_category']=="Science & Tech") 
                   {
                     include_once('../show_science_and_tech.php');  
                   }
                   else if ($_GET['sub_category']=="History") 
                   {
                     include_once('../show_history.php');  
                   }
                 }
               }
               else if ($_GET['show']=="Home") 
               {  
                 if(!empty(isset($_GET['sub_category'])))
                 {
                  if ($_GET['sub_category']=="Populer") 
                   {
                     include_once('../show_populer.php');  
                   }
                   else if ($_GET['sub_category']=="Recent") 
                   {
                     include_once('../show_recent.php');  
                   }
                 }
               }
               include_once('../footer.php');
   }

        
?>  
