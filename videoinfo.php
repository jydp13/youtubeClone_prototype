<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<div align="left" style="margin-top: 50px;">
<h5 align="left">Upload Custom Thumbnail :</h5>
 <div class="uploadbutton" onclick="document.getElementById('uploadthumbnail').click()">
 <input type="file" name="thumbnail" id="uploadthumbnail" accept="image/*"><p id="thumbnail">Upload Thumbnail</p>
 </div>
 <h5>Ttile :</h5>
 <input type="text" name="title" autocomplete="off"><br>
 <h5>Discription :</h5>
 <div id="text" >
 <textarea value="" name="discription" col="50" row="50"  style="resize: none;left: 330px;top: 520px;height:10%;width:50%; position:absolute;"></textarea>
 </div><br><br><br><br>
</form>


<h5>Category<h5>
<select name="category" form="vupload" onchange="show()" id="s">
  <option value="Select">Select</option>
  <option value="Entertainment">Entertainment</option>
  <option value="Educational">Educational</option>
</select>
<h5 id="three" style="display:none;">Sub Category<h5>
<select name="sub_category1" form="vupload" id="two" style="display:none;">
  <option value="Animation">Animation</option>
  <option value="Drawing">Drawing</option>
  <option value="Coding">Coding</option>
  <option value="Science_and_tech">Science & Tech</option>
  <option value="History">History</option>
  <option value="Economics">Economics</option>
</select>
<select name="sub_category2" form="vupload" id="one" style="display:none;">
  <option value="Music">Music</option>
  <option value="Movies">Movies</option>
  <option value="Sport">Sport</option>
  <option value="Vlog">Vlog</option>
  <option value="Shows">Shows</option>
  <option value="Events">Events</option>
</select>
 <input type="submit" value="Upload" name="submit" form="vupload">
</div>
</body>
</html>