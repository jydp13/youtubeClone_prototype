<?php $l=15;
       $m=55;?>
<!doctype html>
  <html>
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
      <script>
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
    function check(){
     if (search.search.value=="") {
      alert('Please provide some input in search box');
     }
   }
     function show(){
      document.getElementById('tik').style.display='block';
     }
      </script>
      <style type="text/css">
        #delete:hover{
          cursor: pointer;
        }
      </style>
<style>
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 500;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 0px;
}

.sidenav a {
    padding: 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    </head>
    <body>
    <div id="header" align="center" class="fix">
    <div id="menu">
    <a href="http://you13.com" class="menu">Home</a>
    <a href="http://you13.com?category=educational" class="menu">Educational</a>
    <a href="http://you13.com?category=entertainment" class="menu">Entertainment</a>
    <a href="http://you13.com?category=account" class="menu">Account</a>
    </div>
     <form>
    <div id="right">
   
      <input type="text" name="search" id="search" style="width: 50%" /></td><td><input type="submit" id="searchbutton" value="Search" onclick="return check()">
 
     </div>
        </form>
   </div>

