<?php
function device($user_agent){
//$u_agent=$_SERVER['HTTP_USER_AGENT'];
//echo $u_agent;
$u_agent=$user_agent;
if (preg_match('/mobile/i', $u_agent) || preg_match('/IEMobile/i', $u_agent)) {
        $device = 'Mobile';
        if (preg_match('/Android/i', $u_agent)) {
        	$os='Android';
        	if (preg_match('/Micromax/i', $u_agent)) {
        		$company='Micromax';
        	}
        	else if(preg_match('/Samsung/i', $u_agent)){
        		$company='Samsung';
        	}
        }
        else if (preg_match('/Mac/i', $u_agent)) {
        	$os='ios';
        	$company='Apple';
        	if (preg_match('/iPad/i', $u_agent)) {
        		$device_type='iPad';

        	}
        	else if (preg_match('/iPhone/i', $u_agent)) {
        		$device_type='iPhone';
        	}

        }
        else if (preg_match('/Windows/i', $u_agent) || preg_match('/NOKIA/i', $u_agent) || preg_match('/Microsoft/i', $u_agent) || preg_match('/Lumia/i', $u_agent)) {
        	$company='Microsoft';
        	if (preg_match('/Windows Phone OS 7.5/i', $u_agent)) {
        		$os='Windows Phone OS 7.5';
        	}
        	else if (preg_match('/Windows Phone 8.0/i', $u_agent)) {
        		$os='Windows Phone 8.0';
        	}
        	else if(preg_match('/Windows Phone 8.1/i', $u_agent))
        	{
        		$os='Windows Phone 8.1';
        	}
        	else if(preg_match('/Windows Phone 8.1/i', $u_agent) && preg_match('/Android 4.0/i', $u_agent))
        	{
        		$os='Windows Phone 8.1 or Android 4.0';
        	}
        }
        else if(preg_match('/BlackBerry/i', $u_agent)){
        	$os='BlackBerry';
        	$company=$os;
        }
    }
    else if(preg_match('/TV/i', $u_agent)){
    	$device='TV';
    }
    else if(preg_match('/CrKey/i', $u_agent)){
    	$device='Chromecast';
    }
    else if(preg_match('/AFTT/i', $u_agent) || preg_match('/AFTM/i', $u_agent)){
    	$device='Amazon Fire Stick';
    }
    else if(preg_match('/Roku/i', $u_agent)){
    	$device='Roku';
    }
    else if(preg_match('/Tizen/i', $u_agent) && preg_match('/TV/i', $u_agent)){
        $device='Samsung Smart TV';
    }
    else if(preg_match('/LG/i', $u_agent) || preg_match('/SmartTV/i', $u_agent) || preg_match('/LGE/i', $u_agent)){
        $device='LG Smart TV';
    }
    else if(preg_match('/BRAVIA/i', $u_agent) || preg_match('/4K/i', $u_agent) || preg_match('/Sony/i', $u_agent)){
        $device='Sony Smart TV';
    }
    else if(preg_match('/TSBNetTV/i', $u_agent)){
        $device='Toshiba Smart TV';
    }
    else if(preg_match('/Philips/i', $u_agent) && preg_match('/PHILIPSTV/i', $u_agent)){
        $device='Philips Smart TV';
    }
    else{
    	$device='Personal Computer';
        if (isset($_SESSION['width']) && isset($_SESSION['height'])) {
            if ($_SESSION['width']=='1366' && $_SESSION['height']=='768') {
                $device_type='Laptop';
                if (preg_match('/Windows/i', $u_agent)) {
                    $os='Windows';
                }
                else if(preg_match('/Macintosh/i', $u_agent)){
                    $os='OS X';
                    $company='Apple';
                }
                else if(preg_match('/Linux/i', $u_agent)){
                       if (preg_match('/Red Hat/i', $u_agent)) {
                           $os='Red Hat';
                        }
                        else if(preg_match('/Ubuntu/i', $u_agent))
                        {
                           $os='Ubuntu';
                        }
                        else if(preg_match('/Mint/i', subject))
                       {
                          $os='Mint';
                       } 
                }  
            }
        }
    }
    $user_device=array('device' => $device,'os' => $os,'company' => $company,'device_type' => $device_type);
    return $user_device;
    //echo $device;
    //echo $os;
    //echo $company;
    //echo $device_type;
//depending upon screen size
//depending upon user agent
}
$d=device($_SERVER['HTTP_USER_AGENT']);
$_SESSION['device']=$d['device'].'_'.$d['device_type'];
?>