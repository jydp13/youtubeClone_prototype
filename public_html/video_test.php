<?php
if ($_SESSION['clip']=='true') {
	echo'<option value="Clip">Clip</option>';
}
else{
	echo ' <option value="Select">Select</option>
  <option value="Entertainment">Entertainment</option>
  <option value="Educational">Educational</option>';
}
?>