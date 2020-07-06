  <?php
 //session_start();
 if (isset($_SESSION['comment'])&&isset($_SESSION['video'])&&isset($_SESSION['category'])&&isset($_SESSION['subcategory'])) {

 }
 else{
signin("share","user");
 }
function signin($database,$table){
 $servername="localhost";
 $username="root";
 $password="";
 $b=$_POST["emailid"];
 $p=$_POST["password1"];
 $b=htmlspecialchars($_POST["emailid"]);
 $hash_pass=htmlspecialchars($_POST["password1"]);
 $p=hash('sha512',$hash_pass);
 $check=0;
 $user_exist=0;
 $conn = new mysqli($servername,$username,$password);
if($conn->connect_error)
 {
  die("connection failed".$conn->connect_error);
 }
if(!empty($b)&&!empty($p))
 {
 $sql = "USE ".$database;
 $conn->query($sql);
 $sql1 = "SELECT*FROM `{$table}`";
 $result=$conn->query($sql1);
 if(mysqli_num_rows($result))
  {
    while($row=mysqli_fetch_assoc($result))
     {

      if($b==$row['emailid'])
        {

          if ($p==$row['password']) {
              $check=1;
              $_SESSION['emailid']=$b;
             //  include_once('../login_info.php');
               header("Location: http://localhost:2000?category=account");
          }
          $user_exist=1;
        }
     }


    if($check!=1 && $user_exist==1)
     {   
           header("Location: http://localhost:2000?category=account&state=3");
     }
     else if($user_exist!=1)
     {
      header("Location: http://localhost:2000?category=account&state=4");
     }
  }
 $conn->close();
}
 else
 {
   header("Location: http://localhost:2000?category=account");
  }
}
?>
    


