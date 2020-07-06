<?php
// session_start();
echo "jaydeep";
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
   
   // if (isset($_GET['search'])) {
   //   $page="search1";
   // }
   // if(!empty(isset($_GET['show'])))
   // {
   //  $page="show";
   // }
   // if (!empty(isset($_GET['watch']))=="true") {
   //   $page="watch";
   // }
   // if($_GET['Comment']=="true"){
   // 	$page="comment";
   // }
   // if ($_GET['category']=="admin_home") {
   //   $page="admin_home";
   // }
   // if($_GET['category']=="groups"){
   //    $page="groups";
   // }
   // if($_GET['error']=="videoerror"){
   //  echo "video formet not suported";
   // }
   // else if($_GET['error']=="imageerror"){
   //  echo "Image format not suported";
   // }

  // if(isset($_GET['su']))
 
  switch($page)
    {
         case 'index':
                include_once('../body.php');
                show('home');
                break;
         case 'educational':
                include_once('../body.php');
                show('edu_sub_category');
                break;
         case 'entertainment':
                include_once('../body.php');
                show('enter_sub_category');
                break;
         case 'live':
                include_once('../body.php');
                show('live_sub_category');
                break;
         case 'account':
                if(isset($_GET['page'])=="signup"){
                   include_once('../signup.html');
                  }
                  else if(isset($_GET['password'])=="reset")
                  {
                    include_once("../password_reset.php");
                  }
                else if(isset($_SESSION['emailid']))
                 {
                   if(isset($_GET['newup'])=="newupload"){
                          include_once('../up.php');
                      }
                      else if ($_GET['like']=="true") {
                        include_once("./like.php");
                      }
                    else{
                   include_once('../account.php');
                    }
                  }
                  else if (isset($_GET['state'])=="2") {
                      echo '<div id="body"><p align="center" style="color: red;">User already exist.Please try diffrent email address</p></div>';
                      include_once('../signup.html');
                  }
                  else if(isset($_GET['state'])=="3"){
                    echo '<div id="body"><p align="center" style="color: red;">Not a valid e-mail address or password</p></div>';
                    include_once('../signin.html');
                  }
                  else if(isset($_GET['state'])=="4"){
                    echo '<div id="body"><p align="center" style="color: red;">You are not ragistered.Please signup.</p></div>';
                    include_once('../signin.html');
                  }
                 else
                  {
                   include_once('../signin.html');
                 }
                break;
         //case 'search':
           //     include_once('../search_result.php');
             //   break;
         case 'upload':
                include_once('../account.php');
                break;
          case 'logout':
                include_once('../logout.php');
                break;
           case 'myvideos':
                include_once('../account.php');
               break;
           
        case 'search1':
                if(!empty($_GET['search']))
                 {
                   $_SESSION['search']=$_GET['search'];
                  include_once('../search_result.php');
                 }
                 else
                 {
                  header("Location: http://you13.com");
                 }
                break;
       case 'show':
               include_once('../show_sub_category_contant.php');
               break;
      case 'watch':
                 include_once('./watch.php');
                break;
      case 'comment':
               if(isset($_SESSION['emailid']))
                 {
                   if($_GET['Comment']=="true"){
	                include_once('./watch.php'); 
                   }	
                 }
              else{
                 include_once('../signin.html');
                 //$_SESSION['comment']=$_GET['comment'];
	               //$_SESSION['video']=$_GET['video'];
                 //$_SESSION['category']=$_GET['category'];
                 //$_SESSION['subcategory']=$_GET['subcategory'];
                  }
              break;
        case 'admin_home':
              include_once('../account.php');
                break;
        case 'groups':
             include_once('../account.php');
             /* echo '<div id="r">
group lists, group create,group delete,enter into group
</div>';*/
                break;
        case 'clips':
              include_once('../body.php');
                show('clips');
                break;
   
   }
?>
