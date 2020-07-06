<?php
    // if(isset($_SESSION['emailid'])){
    //    include_once('../account_home_menu.php');
    //    if($_SESSION['upload_error']=="dualerror"){
    //      echo '<p align="center" style="color: red;">Video & image format not supported.</p>';
    //      unset($_SESSION['upload_error']); 
    //    }
    //    else if($_SESSION['upload_error']=="videoerror"){
    //      echo '<p align="center" style="color: red;">Video format not supported.</p>';
    //      unset($_SESSION['upload_error']); 
    //    }
    //    else if ($_SESSION['upload_error']=="imageerror") {
    //     echo '<p align="center" style="color: red;">Image format not supported.</p>';
    //     unset($_SESSION['upload_error']);
    //    }
?>
<!--<iframe src="" id="progress" style="width: 100%;height: 200px;"></iframe>-->
<div id="r">
<iframe src="session_upload.php" id="vuploadiframe" style="width: 100%; height: 154px; margin-top: 5px; padding-top:5px;margin-left: 1px;margin-right: 1px;" frameborder="0" scrolling="no"></iframe>
 <iframe src="" id="infoiframe" style="width: 100%; height: 800px; margin: 0px; padding: 0px;margin-left: 1px;margin-right: 1px;" frameborder="0" scrolling="no"></iframe>
 </div>
<?php
//}
?>
