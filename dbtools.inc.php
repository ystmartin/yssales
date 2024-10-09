<?php
	

  function create_connection()
  {
    $link = mysqli_connect("localhost", "tw1_yssales", "ys86887029")
      or die("無法建立資料連接: " . mysqli_connect_error());
	  
    mysqli_query($link, "SET NAMES utf8");
			   	
    return $link;
  }
	
  function execute_sql($link, $database, $sql)
  {
    mysqli_select_db($link, $database)
      or die("開啟資料庫失敗: " . mysqli_error($link));
						 
    $result = mysqli_query($link, $sql);
		
    return $result;
  }

  function vistor(){
    date_default_timezone_set("Asia/Shanghai");
    
    if(!empty($_SERVER["HTTP_CLIENT_IP"]))
    {
        $IP = $_SERVER($_SERVER["HTTP_CLIENT_IP"]);
    }
    else if(!empty($_SERVER{"HTTP_X_FOWARD_FOR"}))
    {
        $IP = $_SERVER["HTTP_X_FORWARD_FOR"];
    }
    else
    {
        $IP = $_SERVER["REMOTE_ADDR"];
    }
    
    $ip = $IP;
    $date=date("Y-m-d H:i:s" );
    $time=date("H:i:s");
    $country="Taiwan";
    
    
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = "INSERT INTO vistor (ip,date,time,country,memo) VALUES('$ip','$date','$time','$country','$memo')";
    $result=execute_sql($link,"tw1_yssales",$sql);	
    }
?>