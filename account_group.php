<div id="r">
    <div style="margin-left: 1px;margin-right: 1px;padding-left: 10px;padding-right: 10px;padding-top: 10px; background-color: yellow;">
	    <a href="javascript:void(0)" onclick="group()">Create group</a>
	    <hr>
	    <table>
	    	<tr>
	    		<td>
	    			Group Name : <input type="text" name="group_name">
	             </td>
	             <td>
	             	Group Profile Pic : <input type="file" name="group_profile_pic">
	             </td>
	             <td>
	               <input type="submit" value="Create Group">
	    		</td>
	    	</tr>
	    </table>
	</div>
	<div style="margin-left: 1px;background-color: blue; float: left; width: 100%;height: 100%;">
	    <div style="padding-left: 10px; margin-right: 10px;">
	    	My Groups
	    	My Groups
	    	My Groups
	    	My GroupsMy Groups
	    	My Groups
	    	My Groups
	    	My Groups
	    	My GroupsMy Groups
	    	My Groups
	    	My Groups
	    	My Groups
	    	My Groups
	    	My Groups
	    	<input type="submit" name="" value="Select Video to Share on group" onclick="show_select()">	
	    </div>	
	</div>
	<!--<div style="margin-right: 1px;background-color: blue; float: right;width: 49.80%; height: 500px;">
	    <div style="padding-left: 10px; margin-right: 10px;">All Groups</div>
	</div>-->
</div>
<style type="text/css">
.loader {

	margin: auto;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script type="text/javascript">
	function show_select() {
		document.getElementById("Select").style.display = "block";
	}
</script>
<div id="Select" style="width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto"><div id="inner_select" style=""><div style="padding-top: 150px;"><div class="loader"></div></div></div></div>