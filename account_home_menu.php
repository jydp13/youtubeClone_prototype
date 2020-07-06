<script type="text/javascript">
   function show(){

        document.getElementById('delete').style.display = "block";
        document.getElementById('select_all_button').style.display = "block";
}
</script> 
  <script language="JavaScript">function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
<style type="text/css">
  #left{
      -webkit-transition-property: width; /* Safari */
    -webkit-transition-duration: 5s; /* Safari */
    transition-property: width;
    transition-duration: 1s;
  }

.close {
  position: absolute;
  right: 0px;
  top: 0px;
  width: 32px;
  height: 15px;
  opacity: 0.3;
}
.close:hover {
  opacity: 1;
}
.close:before, .close:after {
  position: absolute;
  left: 20px;
  content: ' ';
  height: 20px;
  width: 3px;
  background-color: white;
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}
</style>
<input type="checkbox" onclick="toggle(this);"  id="select_all" style="display: none;" />
<div id="admin_menu_hide">
<div id="left"  >
<a href="#" class="close" onclick="menu_hide()">
 <a href="http://localhost:2000?category=admin_home">
 <div id="1" class="admin_menu">Home</div>
 </a>
 <a href="http://localhost:2000?category=upload" >
   <div id="2" class="admin_menu">Upload Video</div>
 </a>  
 <a href="http://localhost:2000?category=myvideos" >
  <div id="7" class="admin_menu">My Videos</div>
 </a>
 <a href="http://localhost:2000?category=groups" >
  <div id="3" class="admin_menu">Groups</div>
 </a>
 <div id="4" class="admin_menu">
  <a  style="display: none;"  id="delete" onclick="document.getElementById('del').click();" class="admin_menu">Delete</a>
  </div>
   <div id="5" class="admin_menu" >
  <a  style="display: none;"  id="select_all_button" onclick="document.getElementById('select_all').click()" class="admin_menu">Select All</a>
  </div>
 <a href="http://localhost:2000?category=logout" > 
  <div id="6" class="admin_menu">Logout</div>
  </a>
</div>
</div>

<script type="text/javascript">
  function menu_hide() {
    var w=90;
    document.getElementById('left').style.width="0px";
    setTimeout(function(){ for (var i = 1; i <= 7; i++) {
    document.getElementById(i).style.display="none";
    }document.getElementById('r').style.width='100%'; }, 260);
    
    
  }
</script>


