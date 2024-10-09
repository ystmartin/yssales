<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
	</head>
<body>
<?php
    require_once("dbtools.inc.php");
	$link = create_connection();

       $dbname="upload/ALL.csv";//欲讀取的csv檔案 
       date_default_timezone_set("Asia/Taipei");  
       $getDate= date("Y-m-d");
     
       $sql="DELETE FROM dynamiclist";
       $result=execute_sql($link,"tw1_yssales",$sql);
     
    if (!$fp = fopen($dbname,"r")){ //開檔判斷
        echo "Cannot open $dbname"; //檔案無法開啟
        exit;
    }else{
        $size = filesize($dbname)+1;
        //echo $size;
        $row=0;
        while($temp=fgetcsv($fp,$size,",")){
            //echo $temp;
            if ($row>0){
                //echo $row;
                
                $sql="INSERT INTO dynamiclist (indate, route, depdate, groupid, groupname , productname , agentnet, customnet, totalset, reserve, signup, cansales, getdeposit, depositprice, flight, inoutpoint, groupmemo) 
                VALUES ( '$getDate' ,'$temp[0]','$temp[1]','$temp[2]','$temp[3]','$temp[4]','$temp[5]','$temp[6]','$temp[7]','$temp[8]','$temp[9]','$temp[10]','$temp[11]','$temp[12]','$temp[13]','$temp[14]','$temp[15]')";

                $result=execute_sql($link,"tw1_yssales",$sql);
                //echo $temp[0].",".$temp[1].",".$temp[2].",".$temp[3].",". $temp[4].",".$temp[5].",".$temp[6].",".$temp[7].",". $temp[8].",".$temp[9].",".$temp[10].",".$temp[11].",".$temp[12].",".$temp[13].",".$temp[14].",".$temp[15]."<br>";
           
            }
                $row=$row+1;
        }
        fclose($fp);//關閉檔案
        echo $getDate;
    }

    
    mysqli_free_result($result);
	mysqli_close($link);//關閉資料庫連線

    if(file_exists('upload/ALL.csv')){
         
        unlink('upload/ALL.csv');//將檔案刪除
    }

   echo "匯入已完成,請關閉本視窗";
?>
	</body>
</html>