<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

    <?php

    if ($_COOKIE["passed"] != "TURE" || $_COOKIE["level"] != "admin") {
        echo "<script type ='text/javascript'>";
        echo "alert('無法登入!!');";
        echo "history.back();";
        echo "</script>";
        header("Location:pc_index.php");
    }
    //echo $_COOKIE["passed"];
    $name = $_COOKIE["name"];
    $level = $_COOKIE["level"];
    $records_per_page = 20;
        if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;
    date_default_timezone_set("Asia/Shanghai");


    //	$authcode 	= $_COOKIE["authcode"];



    // if ($passed != "TRUE") {
    // 	header("location:pc_login.php");
    // 	exit();
    // }

    // if ($group != "admin") {
    // 	header("location:pc_index.php");
    // 	exit();
    // }

    $headcolor01 = '#01c9e3';
    $headcolor02 = '#01c9e3';
    echo "<table border='0' width='900' align='center' cellspacing='0'>";
    echo "	<h3 align='center'>團控設定查詢</h3>";
    echo "</table>";
    echo     "<table align='center'>";
    echo    "<tr>";
    echo    "<td>現在時間：" . date('Y/m/d-A:H:i:s') . "</td>";
    echo    "<td>登入帳號：" . $name . "</td>";
    echo    "<td>登入職務：" . $level . "</td>";
    echo    "</tr>";
    echo     "</table>";
    echo "<table border='0' align='center' width='1200' >";
    echo "<tr>";
    echo "<td align='center' bgcolor=$headcolor01 width=15%><a href='pc_index.php'>回動態表</td>";
    echo "<td align='center' bgcolor=$headcolor01 width=15% ><a href='pc_account_admin.php'  target='_blank'>管理頁面</td>";
    echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
    echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
    echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
    echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
    echo "<td align='center' bgcolor=$headcolor01 ></td>";

    echo "</tr>";
    echo "</table>";

    require_once("dbtools.inc.php");
    require_once("indate.php");
    // require_once("push.php");
    $link = create_connection();

    echo "<table border='0' width='900' align='center' cellspacing='0'>";
    echo "	<h3 align='center'>設定衝刺團人次</h3>";
    echo "</table>";

    // 	//查詢總人次
    // 	//	$LastMonth=date("Y-m",strtotime("last month"));
    $sql = "SELECT count(*) as count FROM sp_log ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['count'];

    // 	//查詢今年
    // 	//	$LastMonth=date("Y-m",strtotime("last month"));
    $sql = "SELECT count(*) as count FROM sp_log WHERE YEAR(date)=YEAR(NOW())";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $thisy = $row['count'];

    // 	//查詢本月
    // 	//	$ThisMonth=date("Y-m",strtotime("this month"));
    // 	//	echo $ThisMonth;
    $sql = "SELECT count(*) as count FROM sp_log WHERE DATE_FORMAT(date, '%Y%m') = DATE_FORMAT(CURDATE() , '%Y%m')";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $thism = $row['count'];
    // 	//	echo $thism ;


    // 	//查詢本週
    // 	//	$ThisWeek=date("Y-m",strtotime("this week"));
    // 	echo $ThisWeek;
    $sql = "SELECT count(*) as count FROM sp_log WHERE YEARWEEK(DATE_FORMAT(date,'%Y-%m-%d')) = YEARWEEK(NOW())";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $thisw = $row['count'];
    // //	echo $thisw;


    // 	//查詢昨天
    // 	//	$ThisWeek=date("Y-m",strtotime("this week"));
    $sql = "SELECT count(*) as count FROM sp_log WHERE TO_DAYS( NOW() ) - TO_DAYS( date) = 0";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $yestoday = $row['count'];

    // 	//查詢今天
    // 	//	$ThisWeek=date("Y-m",strtotime("this week"));

    $sql = "SELECT count(*) as count FROM sp_log WHERE TO_DAYS( NOW() ) - TO_DAYS( date) = -1";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $thisday = $row['count'];

    echo "<table border='0' align='center' width='900'>";
    echo "<tr>";
    echo "<td align='center'  width=15% >總人次</td>";
    echo "<td align='center'  width=15% >今年</td>";
    echo "<td align='center'  width=15% >本月</td>";
    echo "<td align='center'  width=15% >本周</td>";
    echo "<td align='center'  width=15% >昨日</td>";
    echo "<td align='center'  >今天</td>";
    echo "</tr>";
    echo "</table>";
    echo "<table border='0' align='center' width='900'>";
    echo "<tr>";
    echo "<td align='center'  width=15% >$total</td>";
    echo "<td align='center'  width=15% >$thisy</td>";
    echo "<td align='center'  width=15% >$thism</td>";
    echo "<td align='center'  width=15% >$thisw</td>";
    echo "<td align='center'  width=15% >$yestoday</td>";
    echo "<td align='center'  >$thisday</td>";
    echo "</tr>";
    echo "</table>";
    ?>


    <table border="0" width="900" align="center" cellspacing="0">
        <h3 align="center">搜尋團號</h3>
    </table>
    <?php
    echo    '<div class="flex-container"></div>';
    echo    '<div class="container-fluid">';
    echo    '<div class="row">';
    echo    '<div class="col-sm-3 item"></div>';
    echo    '<div class="col-sm-1 item"><form name="form1" method="post" action="pc_logreader.php"></div>';
    echo    '<div class="col-sm-3 item">團號：<input type="text" name="groupid"><input type="submit" value="輸入"></div>';
    echo    '<div class="col-sm-1 item"></form></div>';
    echo    '<div class="col-sm-4 item"></div>';
    echo    '</div>';
    echo    '</div>';
    $groupid=$_POST["groupid"];

    $groupid=trim($groupid);
    if ($groupid!=""){
        $sql = "SELECT * FROM sp_log where groupid like '%$groupid%' order by id DESC";
    }else{
        $sql = "SELECT * FROM sp_log order by id DESC";
    }

    $link = create_connection();

    $result = execute_sql($link, "tw1_yssales", $sql);
    $total_fields = mysqli_num_fields($result);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $records_per_page);
    $started_record = $records_per_page * ($page - 1);
    mysqli_data_seek($result, $started_record);
    //echo $sql;

    // 從資料庫中取得資料

    $headcolor01 = '#ff9800';
    $headcolor02 = '#01c9e3';
    echo "<table border='0' width='900' align='center' cellspacing='0'>";
    echo "	<h3 align='center'>帳號清單</h3>";
    echo "</table>";
    echo "<table border='0' align='center' width='900'>";
    echo "<tr>";
    echo "<td align='center' bgcolor=$headcolor02 width=10% >序號</td>";
    echo "<td align='center' bgcolor=$headcolor02 width=20% >更新日期</td>";
    echo "<td align='center' bgcolor=$headcolor02 width=10% >團號</td>";
    echo "<td align='center' bgcolor=$headcolor02 width=5% >帳號</td>";
    echo "<td align='center' bgcolor=$headcolor02 width=10% >衝刺狀態</td>";
    echo "<td align='center' bgcolor=$headcolor02 >衝刺備註</td>";
    echo "</tr>";

    $j = 0;
    while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page) {
        if ($j % 2 == 0) {
            $color = "Pink";
        }
        if ($j % 2 == 1) {
            $color = "";
        }

        echo "<tr bgcolor='$color'>";
        //   echo "<td align='center'>$j</td>";
        echo "<td align='center'>$row[id]</td>";
        echo "<td align='center'>$row[date]</td>";
        echo "<td align='right' >$row[groupid]</td>";
        echo "<td align='right' >$row[sp_user]</td>";
        echo "<td align='center'>$row[sp_flag]</td>";
        echo "<td align='left'>$row[sp_memo]</td>";
        echo "</tr>";

        $j++;
    }


    echo "</table>";

    echo "<p align='center'>";
    echo "<a href=pc_logreader.php?page=1>第一頁</a> ";
    for( $i=1 ; $i<=$total_pages ; $i++ ) {
        if ( $page-1 < $i && $i < $page+1 ) {
            $prepage=$i-1;
            echo "<a href=pc_logreader.php?page=".$prepage.">"."上一頁"."</a> ";
            echo "共 ".$total_records." 筆;目前在第--".$i."--頁 ;共 ".$total_pages." 頁";
            $nextpage=$i+1;
            echo "<a href=pc_logreader.php?page=".$nextpage.">"."下一頁"."</a> ";
            $nextpage=$i+2;
            echo "<a href=pc_logreader.php?page=".$nextpage.">"."下二頁"."</a> ";
            $nextpage=$i+3;
            echo "<a href=pc_logreader.php?page=".$nextpage.">"."下三頁"."</a> ";
        }
    }
    echo "<a href=pc_logreader.php?page=".$total_pages.">最末頁</a>";

    echo "</p>";


    mysqli_free_result($result);
    mysqli_close($link);

    ?>

</body>

</html>