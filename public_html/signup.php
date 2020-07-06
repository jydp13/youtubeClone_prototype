<?php 
session_start();
if(isset($_POST))
{
if(!empty($_POST["firstname"])&&!empty($_POST["lastname"])&&!empty($_POST["emailid"])&&!empty($_POST["password1"])&&!empty($_POST["password2"]))
 {

   if ($_POST["password1"]!=$_POST["password2"]) {
     header("Location: http://localhost:2000?category=account&page=signup");
     die();
   }
   else{
   		include_once("../mysql.php");
  		$u=mysqli_real_escape_string($conn, htmlspecialchars($_POST["firstname"]));
   		$a=mysqli_real_escape_string($conn, htmlspecialchars($_POST["lastname"]));
   		$b=mysqli_real_escape_string($conn, htmlspecialchars($_POST["emailid"]));
   		$p=mysqli_real_escape_string($conn, htmlspecialchars($_POST["password1"]));
   		$p2=mysqli_real_escape_string($conn, htmlspecialchars($_POST["password2"]));
   		$hash_password = hash('sha512', $p);
   		$usertest="SELECT emailid FROM user WHERE emailid='{$b}'";
   		if (mysqli_num_rows($conn->query($usertest))) {
  			header("Location: http://localhost:2000?category=account&state=2");
   		}
   		else{ 
      		if (filter_var($b, FILTER_VALIDATE_EMAIL)) {
      			
          		//$result=shell_exec('php country.php');
          		$country='testcountry';
             // 	$result = explode(PHP_EOL, $result);
            	// $country = $result[0];
            	$sql1 = "INSERT INTO user(firstname,lastname,emailid,password,country) VALUES('$u','$a','$b','$hash_password','$country')";

        //--------------------------------------------------------------------------------------
           		mysqli_autocommit($conn,FALSE);
            	if(!isset($_SESSION['refresh'])){
              		$result=$conn->query($sql1);
             	    if($result==FALSE){
                		mysqli_rollback($conn);
               		}
              		else{
                   		mysqli_commit($conn);
                   		$_SESSION['refresh']="true";
                   		$_SESSION['emailid']=$b;
                   		$conn->close();
                   		header("Location: http://localhost:2000?category=account");
              		}
            	}
            	else{
               		header("Location: http://localhost:2000?category=account&page=signup");
            	}
// //---------------------------------------------------------------------------------------------------------

//              /*if($conn->query($sql1))
//              {
//                $_SESSION['refresh']="true";
//                $_SESSION['emailid']=$b;
//                $conn->close();
//                header("Location: http://you13.com?category=account");
//              } */
            }
         	else{
          		header("Location: http://localhost:2000?category=account&page=signup");
         	}
      	}
  	}
 }
 else{
 	header("Location: http://you13.com?category=account&page=signup");  
 }
}
else
{
  echo "not ok";
}

?>
