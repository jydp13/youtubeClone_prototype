<?php 
   $current_date=date("Y-m-d");$time=strtotime($current_date)-strtotime($row['upload_date']);                                
   $minite=$time/60;
   $hour=$minite/60; 
   if ($hour==24) {
   	echo $hour." Hours ago";
   }
   else if ($hour>24) {
   		$days=$time/60/60/24;
   	echo $days." Days ago"; 
   }
 ?> 