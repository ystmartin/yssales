<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>

<?php




$user_agent = $_SERVER["HTTP_USER_AGENT"];
if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
{
	//echo "mobile device detected";
	header("Location: m_login.php"); //手機版
}
else{
	//echo "mobile device not detected";
	//header("Location: http://s90304a123.pixnet.net"); 
	header("Location: pc_login.php");  //電腦版
}
/*

	//是否為行動裝置
function isMobileCheck(){
    //Detect special conditions devices
    $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
        $Android = true;
    }else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
        $Android = false;
        $AndroidTablet = true;
    }else{
        $Android = false;
        $AndroidTablet = false;
    }
    $webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
    //do something with this information
    if( $iPod || $iPhone || $iPad || $Android || $AndroidTablet || $webOS || $BlackBerry || $RimTablet){
        return true;
    }else{
        return false;
    }
} 
	
	
	
	if(isMobileCheck()) {
		header(“Location: m_index.php”); //手機版
	}else {
		header(“Location: pc_index.php”);  //電腦版
	}

	*/
	
	?>
	</body>
</html>
		
