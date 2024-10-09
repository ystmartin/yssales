<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
	</head>
<body>
<?php
    require_once("dbtools.inc.php");
	$link = create_connection();

       $dbname="csv/ALL.csv";//欲讀取的csv檔案 
       date_default_timezone_set("Asia/Taipei");  
       $getDate= date("Y-m-d");
     
    //    $sql="DELETE FROM dynamiclist";
    //    $result=execute_sql($link,"tw1_yssales",$sql);
     
    if (!$fp = fopen($dbname,"r")){ //開檔判斷
        echo "Cannot open $dbname"; //檔案無法開啟
        exit;
    }else{
        $size = filesize($dbname)+1;
        echo $size;
        $row=0;
        while($temp=fgetcsv($fp,$size,",")){
            //echo $temp;
                if ($row>3){
                    //echo $row;
                    /*
                    if($temp[15]=='後補可報名'){
                        $temp[15]='後補';
                    }
                    if($temp[15]=='截止可報名'){
                        $temp[15]='截止';
                    }
                    */
                    
                    $sql="INSERT INTO dynamiclist (indate, route, depdate, groupid, groupname , productname , agentnet, customnet, totalset, reserve, signup, cansales, getdeposit, depositprice, flight, inoutpoint,status, groupmemo) 
                    VALUES ( '$getDate' ,'$temp[0]','$temp[1]','$temp[2]','$temp[3]','$temp[4]','$temp[5]','$temp[6]','$temp[7]','$temp[8]','$temp[9]','$temp[10]','$temp[11]','$temp[12]','$temp[13]','$temp[14]','$temp[15]','$temp[16]')";
                    // $sql="INSERT INTO dynamiclist (indate, route, depdate, groupid, groupname , productname , agentnet, customnet, totalset, reserve, signup, cansales, getdeposit, depositprice, flight, inoutpoint,status, groupmemo) 
                    // VALUES ( '$getDate' ,'$temp[0]','$temp[1]','$temp[2]','$temp[3]','$temp[4]','$temp[5]','$temp[6]','$temp[7]','$temp[8]','$temp[9]','$temp[10]','$temp[11]','$temp[12]','$temp[13]','$temp[14]','$temp[15]','$temp[16]')
                    // ON DUPLICATE KEY UPDATE groupname='$temp[3]' , productname='$temp[4]' , agentnet='$temp[5]', customnet='$temp[6]', totalset='$temp[7]', reserve='$temp[8]', signup='$temp[9]', cansales='$temp[10]', getdeposit='$temp[11]', depositprice='$temp[12]', flight='$temp[13]', inoutpoint='$temp[14]',status='$temp[15]', groupmemo='$temp[16]'";

                    $result=execute_sql($link,"tw1_yssales",$sql);
                    //echo $temp[0].",".$temp[1].",".$temp[2].",".$temp[3].",". $temp[4].",".$temp[5].",".$temp[6].",".$temp[7].",". $temp[8].",".$temp[9].",".$temp[10].",".$temp[11].",".$temp[12].",".$temp[13].",".$temp[14].",".$temp[15]."<br>";
            
                }
                $row=$row+1;
        }
        fclose($fp);//關閉檔案
        $getDate2= date("Y-m-d H:i:s");
        echo $getDate2."<br>";
    }

    $sql="DELETE FROM dynamiclist where route like'%總計%' ";
    $result=execute_sql($link,"tw1_yssales",$sql);
    
    mysqli_free_result($result);
	mysqli_close($link);//關閉資料庫連線

    if(file_exists('csv/ALL.csv')){
         
        unlink('csv/ALL.csv');//將檔案刪除
    }
    if(file_exists('xlsx/ALL.xlsx')){
         
        unlink('xlsx/ALL.xlsx');//將檔案刪除
    }

   echo "動態表匯入已完成,請關閉本視窗123";
?>
	</body>
</html>