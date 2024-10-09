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
    date_default_timezone_set("Asia/Shanghai");
    $groupid = $_GET["groupid"];
    //$groupid = $_POST["groupid"];
    echo 'groupid:'.$groupid.'<br>';
    $sp_memo = $_POST["sp_memo"];
    echo 'sp_memo:'.$sp_memo.'<br>';
    require_once("dbtools.inc.php");
    //require_once("indate.php");
    //require_once("push.php");
    $link = create_connection();
    
    $sql="SELECT * FROM spfclist where groupid = '$groupid' ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $sp_flag=$row['sp_flag'];
    echo 'sp_flag:'.$sp_flag.'<br>';
    if($sp_flag!="Y"){
        $sp_flag="Y";
    }else{
        $sp_flag="N";
    }
    echo 'sp_flag:'.$sp_flag.'<br>';


    $sql="INSERT INTO spfclist (groupid,sp_flag, sp_memo, sp_user) VALUES ( '$groupid' ,'$sp_flag' ,'$sp_memo','$sp_user')
    ON DUPLICATE KEY UPDATE groupid='$groupid' , sp_flag='$sp_flag' , sp_memo='$sp_memo' , sp_user='$sp_user'";

    $result = execute_sql($link, "tw1_yssales", $sql);

    $date=date("Y/m/d H:i:s");
    echo 'date:'.$date.'<br>';
    $sp_user= $_COOKIE["name"];
    echo 'sp_user:'.$sp_user.'<br>';
     
    //$sql2 = "INSERT INTO sp_log (date,groupid,sp_user,sp_flag,sp_memo) VALUES('$date','$groupid','$sp_user','$sp_flag','$sp_memo')";
    $sql2 = "INSERT INTO sp_log (date,groupid,sp_user,sp_flag,sp_memo) VALUES('$date','$groupid','$sp_user','$sp_flag','$sp_memo')";
    $result2 = execute_sql($link, "tw1_yssales", $sql2);

    echo $result2;
    
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_close($link);
        
 
    header("Location: rc_index.php")
    ?>

</body>

</html>