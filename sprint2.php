<!DOCTYPE html>
<html>

<head>
<title>網頁衝刺團</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
    require_once("dbtools.inc.php");


    if($_COOKIE["passed"]!="TURE"){
        echo "<script type ='text/javascript'>";
        echo "alert('無法登入!!');";
        echo "history.back();";
        echo "</script>";
        header("Location:pc_login.php");
}


    $route     = $_GET["sp_route"];

    $records_per_page = 50;
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;

    ?>
    <table border='0' align='center' class='sp_head'>
        <tr>
            <th>
                <align='center'>
                    <h1 align='center'>
                        <font color='white'> 衝刺團</font>
                        </a>
                    </h1>
            </th>

        </tr>
    </table>

    <?php
    
    echo '<div class="flex-container"></div>';
    echo '<div class="pc_head01_1 container-fluid">';
    echo '<div class="row sp_head">';
    echo '<div class="col-sm-1 item"><form name="form1" method="post" action="pc_index.php"></div>';
    echo '<div class="col-sm-3 item">搜尋產品關鍵字：<input type="text" name="name"><input type="submit" value="輸入"></div>';
    echo '<div class="col-sm-1 item"></form></div>';
    echo '<div class="col-sm-1 item"><form name="form2" method="post" action="sp_cookie.php"></div>';
    echo '<div class="col-sm-3 item">鎖定月份(如1或2...)：<input type="text" name="month"><input type="submit" value="輸入"></div>';
    echo '<div class="col-sm-1 item"></form></div>';
    echo "</div>";
    echo "</div >";
    echo "</div >";

    


    if ($route != "") {
        //     //$sql3="SELECT * FROM dynamiclist where route = '$route' and sp_flag = 'Y' order by depdate ASC ";
        $sql3 = "SELECT dynamiclist.*, spfclist.`sp_flag`
        FROM spfclist
        JOIN dynamiclist
        ON spfclist.`groupid` = dynamiclist.`groupid`
        where route = '$route' and sp_flag = 'Y' order by depdate ASC";
        //     $result3 = execute_sql($link, "tw1_yssales", $sql3);
        $route_dsp = $route;
    } else {
        //     //$sql3="SELECT * FROM dynamiclist where sp_flag = 'Y' order by depdate ASC ";
        $sql3 = "SELECT dynamiclist.*, spfclist.`sp_flag`
        FROM spfclist
        JOIN dynamiclist
        ON spfclist.`groupid` = dynamiclist.`groupid`
        where sp_flag = 'Y' order by depdate ASC";
        //     $result3 = execute_sql($link, "tw1_yssales", $sql3);
        $route_dsp = "全線";
    }

    ?>

    <div class="flex-container"></div>
    <div class="head01">
        <div>線別<?php echo $route_sel; ?></div>
    </div>

    <div class="row">
        <?php
        $link = create_connection();
        $sql = "SELECT * FROM dynamiclist Group by  route ";
        $result = execute_sql($link, "tw1_yssales", $sql);
        //$total_fields = mysqli_num_fields($result);
        //$total_records = mysqli_num_rows($result);

        echo '<div class="flex-container"></div>';
        echo '<div class="row">';
        echo '<div class="col-sm-1 item"><a href=sprint.php?route=' . '' . ' ' . 'target="_self"><h4>' . '全線' . '</h4></a></div>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-1 item"><a href=sprint.php?sp_route=' . $row["route"] . ' ' . 'target="_self"><h4>' . $row["route"] . '</h4></a></div>';
        }
        echo '</div>';
        ?>
    </div>

    <div class="flex-container"></div>
    <div class="head03">
        <div>行程列表(<?php echo $route_dsp; ?>)</div>
    </div>
    <table class="table table-striped">
        <thead>
            <th>出發日期</th>
            <th>產品名稱</th>
            <th>團號</th>
            <th>直客價</th>
            <th>同業價</th>
            <th>機位數</th>
            <th>報名</th>
            <th>可售</th>
            <th>收訂</th>
            <th>狀態</th>
            <th>衝刺團</th>
            <th>衝刺團備註</th>
            <!-- <th>Finalcall</th> -->


        </thead>

        <?php

        echo $route_sel;
        $result3 = execute_sql($link, "tw1_yssales", $sql3);
        $total_fields = mysqli_num_fields($result3);
        $total_records = mysqli_num_rows($result3);
        $total_pages = ceil($total_records / $records_per_page);
        $started_record = $records_per_page * ($page - 1);
        mysqli_data_seek($result3, $started_record);
        $j = 1;
        while ($row3 = $result3->fetch_assoc() and $j <= $records_per_page) {

            echo "<tr>";
            echo "<td align='left'  width='8%'  ><font color=$font_color>" . $row3['depdate'] . "</td>";
            echo "<td align='left'  width='25%'  ><font color=$font_color>" . $lock . $row3['productname'] . "</td>";
            echo "<td align='left'  width='6%'  >" . $row3['groupid'] . "</td>";
            echo "<td align='left'  width='6%'  >" . "$" . number_format($row3['customnet']) . "</td>";
            echo "<td align='left'  width='6%'  >" . "$" . number_format($row3['agentnet']) . "</td>";
            echo "<td align='left'  width='5%'  >" . $row3['totalset'] . "</td>";
            echo "<td align='left'  width='5%'  >" . $row3['signup'] . "</td>";
            echo "<td align='left'  width='5%'  >" . $row3['cansales'] . "</td>";
            echo "<td align='left'  width='5%'  >" . $row3['getdeposit'] . "</td>";
            echo "<td align='left'  width='10%'  >" . $row3['status'] . "</td>";

            $sql4 = "SELECT * FROM spfclist where groupid = '$row3[groupid]'";
            $result4 = execute_sql($link, "tw1_yssales", $sql4);
            $row4 = mysqli_fetch_assoc($result4);

            if ($row4['sp_flag'] == 'Y') {

                $sp_button = "<div class='pc_button-1'>有</div>";
            } else {
                $sp_button = "<div class='pc_button-2'>沒</div>";
            };

            echo "<td align='center' width='4%'>" . "$sp_button" . "</td>";
            $sp_memo = $row4['sp_memo'];
            $sp_memo = substr($sp_memo, 0, 60);

            echo "<td  width='14%'>" . $sp_memo . "</td>";
            // echo "<td align='center' >" . "<div class='pc_button-2'>沒</div></a>"  . "</td>";
            echo "</tr>";
            $j++;
        }
        echo "</table>";

        echo "</p>";
        echo "<p align='center'>";
        echo "<a href=sprint.php?page=1>第一頁</a> ";
        for( $i=1 ; $i<=$total_pages ; $i++ ) {
            if ( $page-1 < $i && $i < $page+1 ) {
                $prepage=$i-1;
                echo "<a href=sprint.php?page=".$prepage.">"."上一頁"."</a> ";
                echo "共 ".$total_records." 筆;目前在第--".$i."--頁 ;共 ".$total_pages." 頁";
                $nextpage=$i+1;
                echo "<a href=sprint.php?page=".$nextpage.">"."下一頁"."</a> ";
            }
        }
        echo "<a href=sprint.php?page=".$total_pages.">最末頁</a>";
        echo "</p>";
        mysqli_free_result($result);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
        mysqli_free_result($result4);
        mysqli_close($link);
        ?>
 
</body>

</html>