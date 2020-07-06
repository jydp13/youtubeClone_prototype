<?php $l=15;
       $m=55;?>
<!doctype html >
  <html >
    <head>
      <title>You13</title>
      <link rel="shortcut icon" href="icon/logo.png" />
      <link rel="stylesheet" type="text/css" href="formstyle.css">
      <link rel="stylesheet" type="text/css" href="bodystyle.css">
      <link rel="stylesheet" type="text/css" href="layout.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--<noscript>
         <body>
           <p>Please enable javascript in your browser to view </p>
         </body> 
   <style>body{ visibility: hidden;  }
                a{
                   visibility: hidden;
                  }</style>
 </noscript>-->
 <noscript> 
   <style>html{
    display: none;
    }</style>
 </noscript>
 <script type="text/javascript">
/*
        window.oncontextmenu = function () {
                       return false;
                    }
*/
       /* document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (
             
             e.keyCode === 85 )) {
            return false;
        } else {
            return true;
        }
};*/
/*window.onkeydown = function(e){
    if(e.keyCode == 27){
       e.preventDefault();
       
    }
    else if (e.keyCode == 122) {
       e.preventDefault();
      alert('hello');
    }
}*/
</script>
  <script type="text/javascript">
     function show(){
      document.getElementById('tik').style.display='block';
     }
    <?php if (!isset($_COOKIE['user'])){?>
   function up(){
    var hr = new XMLHttpRequest();
    var url = "file_up.php";
    var source = document.referrer;
    var d=new Date();
    var width = screen.width;
    var height = screen.height;
    var vars = "width="+width+"&height="+height+"&timezone="+d+"&source="+source;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.send(vars); 
}
<?php } else{
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($pageWasRefreshed ) {
   //do something because page was refreshed;
} else {?>
     function up(){
    var hr = new XMLHttpRequest();
    var url = "file.php";
    var source = document.referrer;
    var vars = "source="+source;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.send(vars); 
  }
  <?php } }?>
  function search() {
    var q=document.getElementById('search').value;
     if (q=="") {
      alert('Please provide some input in search box'); 
      return false;

     }
     else{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector('html').innerHTML =this.responseText;
    }
  };
  xhttp.open("GET", "index.php?search="+q, true);
  xhttp.send();
     }
}
   </script>
      <style type="text/css">
        #delete:hover{
          cursor: pointer;
        }
      </style>
    </head>
    <body onload="up()">
    <div id="header_hide" >
    <div id="header"  class="fix" style="z-index: 1;border-width:1px ;border-bottom-style: solid;
    border-bottom-color: red;">
    <a href="http://localhost:2000" class="menu">Home</a>
    <a href="http://localhost:2000/?category=educational" class="menu">Educational</a>
    <a href="http://localhost:2000/?category=entertainment" class="menu">Entertainment</a>
    <a href="http://localhost:2000/?category=clips" class="menu">Clips</a>
    <a href="http://localhost:2000/?category=services" class="menu">Services</a>
    <a href="http://localhost:2000/?category=account" class="menu">Sign In</a>
     <input type="text" name="search" id="search" style="width: 18%;margin-right: 0px;padding-right: 0px;" /><input type="submit" id="searchbutton" value="Search" onclick="search()" style="width: 5%;height: 62%;padding-top: 1px;margin-left: 0px;padding-left: 0px;">
   </div>
   </div>



