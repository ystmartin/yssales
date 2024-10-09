<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Data table 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

     Data table auto colum hiding

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />

     Data table search
    <script src="https://cdn.datatables.net/searchbuilder/1.5.0/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.5.0/css/searchBuilder.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" />



     連接CSS -->

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    //清除科威已刪除項目
    include 'cleanspfclist.php';

    date_default_timezone_set("Asia/Shanghai");
    $groupid = $_GET["groupid"];
    echo "groupid:".$groupid;
    $fc_depdate = $_POST["fc_depdate"];
    //$groupid = $_POST["groupid"];
    echo 'groupid:'.$groupid.'<br>';
    $fc_type = $_POST["fc_type"];
    $fc_pname = urldecode($_POST["fc_pname"]);
    $fc_price = $_POST["fc_price"];
    $fc_airline = $_POST["fc_airline"];
    $fc_setoff = $_POST["fc_setoff"];
    $fc_memo = $_POST["fc_memo"];
    $fc_memo = mb_substr( $fc_memo,0,30,"utf-8");
    echo 'fc_type:'.$fc_type.'<br>';
    echo 'fc_airline:'.$fc_airline.'<br>';
    echo 'fc_setoff:'.$fc_setoff.'<br>';
    echo 'fc_memo:'.$fc_memo.'<br>';
    require_once("dbtools.inc.php");
    //require_once("indate.php");
    //require_once("push.php");
    $link = create_connection();
    
    $sql="SELECT * FROM spfclist where groupid = '$groupid' ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $fc_flag=$row['fc_flag'];
    echo 'fc_flag:'.$fc_flag.'<br>';
    if($fc_flag!="Y"){
        $fc_flag="Y";
    }else{
        $fc_flag="N";
    }
    echo 'fc_flag:'.$fc_flag.'<br>';


    $sql="INSERT INTO spfclist (groupid,fc_depdate,fc_flag, fc_type, fc_pname, fc_price, fc_airline, fc_setoff,fc_memo, fc_user) VALUES ( '$groupid' ,'$fc_depdate','$fc_flag' ,'$fc_type' ,'$fc_pname' ,'$fc_price' ,'$fc_airline' ,'$fc_setoff' ,'$fc_memo','$fc_user')
    ON DUPLICATE KEY UPDATE groupid='$groupid' , fc_depdate='$fc_depdate' , fc_flag='$fc_flag',fc_type='$fc_type' ,fc_pname='$fc_pname' ,fc_price='$fc_price' ,fc_airline='$fc_airline' ,fc_setoff='$fc_setoff' , fc_memo='$fc_memo' , fc_user='$fc_user'";

    $result = execute_sql($link, "tw1_yssales", $sql);

    $date=date("Y/m/d H:i:s");
    echo 'date:'.$date.'<br>';
    $fc_user= $_COOKIE["name"];
    echo 'fc_user:'.$fc_user.'<br>';
     
    //$sql2 = "INSERT INTO sp_log (date,groupid,sp_user,sp_flag,sp_memo) VALUES('$date','$groupid','$sp_user','$sp_flag','$sp_memo')";
    $sql2 = "INSERT INTO fc_log (date,groupid,fc_user,fc_flag,fc_memo,fc_type,fc_airline,fc_setoff) VALUES('$date','$groupid','$fc_user','$fc_flag','$fc_memo','$fc_type','$fc_airline','$fc_setoff')";
    $result2 = execute_sql($link, "tw1_yssales", $sql2);

    echo $result2;


    //$sql = "DELETE FROM b2bdm  WHERE  tour_id='$tour_id')";
    $sql3 = "DELETE FROM spfclist where fc_depdate <= now() ";
    $result3=execute_sql($link,"tw1_yssales",$sql3);	

    if(! $result3 )
    {
    die('無法插入資料: ' . mysqli_error($link));
    }
    echo "資料插入成功\n";

    
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_close($link);
        
 
     header("Location: rc_index.php")
    ?>

</body>

</html>