
<?php
//session_start();
if(isset($_SESSION['emailid'])){
	include_once('../mysql.php');
  // if (!isset($_SESSION['login_info'])) {
  //  include_once('../login_info.php');
  //  $_SESSION['login_info']=1;
  // }
    $sql1 = "SELECT*FROM user WHERE emailid='{$_SESSION['emailid']}'";
    $result=$conn->query($sql1);
    if(mysqli_num_rows($result))
    {

      include_once('../account_home_menu.php');
      if ($_GET['category']=="admin_home" || $_GET['category']=="account") {
         include_once('../account_home.php');
      }
      else if($_GET['category']=="groups"){
        include_once('../account_group.php');
       }
      // else if (isset($_GET['state'])=="1") {
      //      include_once('../mysql.php');
      //   include_once('../myvideos.php');
      // }
      else if($_GET['category']=="upload")
      {
        // if($_GET['type']=="videoerror")
        //         {   
        //             $_SESSION['upload_error']=$_GET['type'];
        //             include_once('../up.php');
        //         }
        //         else if($_GET['type']=="imageerror")
        //         {
        //           $_SESSION['upload_error']=$_GET['type'];
        //           include_once('../up.php');
        //         }
        //         else if ($_GET['type']=="dualerror") {
        //           $_SESSION['upload_error']=$_GET['type'];
        //           include_once('../up.php');
        //         }
        //         else
        //         {
        //             include_once('../up.php');
        //         }
        include_once('../up.php');
      }
      else if($_GET['category']=="myvideos"){
        include_once('../mysql.php');
        include_once('../myvideos.php');
      }

      
    }
    else
     {
     	session_unset();
     	session_destroy(); 
     	header("Location: http://localhost:2000?category=account&state=4");
     }
}
else
{
header("Location: http://localhost:2000?category=account");
}
?>

