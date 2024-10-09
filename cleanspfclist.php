<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    date_default_timezone_set("Asia/Shanghai");
    echo "start"."<br>";

    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql="SELECT * FROM spfclist";
    $result = execute_sql($link, "tw1_yssales", $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        
        $groupid01=$row['groupid'];
        
        // $sql2="SELECT count(*) as idcount FROM dynamiclist where groupid = $groupid01";
        $sql2="SELECT count(*) as idcount FROM dynamiclist where groupid like '$groupid01'";
        $result2 = execute_sql($link, "tw1_yssales", $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        // echo $groupid01."=".$row2['idcount']."<br>";

            if($row2['idcount'] == '0'){
                echo $groupid01." == 0"."<br>";
                $sql3 = "DELETE FROM spfclist where groupid like '$groupid01'";
                $result3=execute_sql($link,"tw1_yssales",$sql3);	

                if(! $result3 )
                {
                die('無法刪除資料: ' . mysqli_error($link));
                }
                echo "資料刪除成功\n";
                }
    }
    
    


    //$sql = "DELETE FROM b2bdm  WHERE  tour_id='$tour_id')";
    // $sql3 = "DELETE FROM spfclist where fc_depdate <= now() ";
    // $result3=execute_sql($link,"tw1_yssales",$sql3);	

    // if(! $result3 )
    // {
    // die('無法插入資料: ' . mysqli_error($link));
    // }
    // echo "資料插入成功\n";

    echo "end"."<br>";
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_close($link);
        
 
    // header("Location: rc_index.php")
    ?>

</body>

</html>