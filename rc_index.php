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

if($_COOKIE["passed"]!="TURE" ||$_COOKIE["level"]!="RC"){
    echo "<script type ='text/javascript'>";
    echo "alert('無法登入!!');";
    echo "history.back();";
    echo "</script>";
    header("Location:pc_index.php");

}
//echo $_COOKIE["passed"];
$name=$_COOKIE["name"];
$level=$_COOKIE["level"];
date_default_timezone_set("Asia/Shanghai");
    require_once("dbtools.inc.php");
    $route     = $_COOKIE["rc_route"];
    $groupcook     = $_COOKIE["rc_groupname"];


    $setsp01     = $_COOKIE["setsp01"];
    if ($setsp01 == "Y") {
        $setsp01 = "Y";
    } else {
        $setsp01 = "N";
    }
    $setsp02     = $_COOKIE["setsp02"];
    if ($setsp02 == "Y") {
        $setsp02 = "Y";
    } else {
        $setsp02 = "N";
    }
    $setsp03     = $_COOKIE["setsp03"];
    if ($setsp03 == "Y") {
        $setsp03 = "Y";
    } else {
        $setsp03 = "N";
    }
    $setsp04     = $_COOKIE["setsp04"];
    if ($setsp04 == "Y") {
        $setsp04 = "Y";
    } else {
        $setsp04 = "N";
    }
    //echo 'setsp01:'.$setsp01.'-'.'setsp02:'.$setsp02.'-'.'setsp03:'.$setsp03.'-'.'setsp04:'.$setsp04;


    if ($setsp01 != "Y") {
        $chkcolor01 = "white";
    } else {
        $chkcolor01 = "blue";
    }
    if ($setsp02 != "Y") {
        $chkcolor02 = "white";
    } else {
        $chkcolor02 = "blue";
    }
    if ($setsp03 != "Y") {
        $chkcolor03 = "white";
    } else {
        $chkcolor03 = "blue";
    }
    if ($setsp04 != "Y") {
        $chkcolor04 = "white";
    } else {
        $chkcolor04 = "blue";
    }

    /*
	$passed = "false";
	$name 	= $_COOKIE["name"];
	$group 	= $_COOKIE["group"];
	$passed 	= $_COOKIE["passed"];
	date_default_timezone_set("Asia/Shanghai");


	if ($passed != "TRUE") {
		header("location:pc_login.php");
		exit();
	}

    $records_per_page = 50;
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;
        */

        //$search   = $_POST["search"];
        $search     = $_COOKIE["search"];
        if($search!=''){
            $records_per_page = 1000;
        }
    ?>
    <!-- <table class='rcindex_head' border='0' align='center'>
        <tr>
            <th align='center'><a href='index.php'>
                    <h1 align='center'>
                        <font color='white'> 衝刺團及FinalCall設定</font>
                    </h1>
            </th>

        </tr>
    </table> -->

    <div class="flex-container"></div>
        <div class="rc_head01">
            <div class="row">
                <dvi><a href='rc_index.php'>
                    <h1 align='center'>
                        <font color='white'>衝刺團及FinalCall設定</font>
                    </h1></a>
                </div>
            </div>

        </div>
    </div>
    <div class="flex-container"></div>
        <div class="rc_head01_1">
            <div class="row">
                <?php
                
                echo "<div class='col-sm-1 item'><a href='pc_index.php' target='_self'><font color='white'><h6>動態表</h6></font></a></div>";
                //echo "<div class='col-sm-1 item'><a href='rc_index.php' target='_self'><font color='white'><h6>線控設定</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='sprint.php' target='_blank'><font color='white'><h6>衝刺表</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='https://7029.tw/finalcall/' target='_blank'><font color=white><h6>Finalcall</h6></font></a></div>";
                //echo "<div class='col-sm-1 item'><a href='pc_account_admin.php?'><font color='white'><h6>管理</h6></font></a></div>";
                echo    '<div class="col-sm-1 item"><form name="form1" method="post" action="rc_cookie.php"></div>';
                //echo     '<table border="0" width="200" align="center" cellspacing="0">';
                echo            '<div class="col-sm-3 item">搜尋產品名稱或團號：<input type="text" name="search"><input type="submit" value="輸入"></div>';
                //echo    '</table>';
                echo    '<div class="col-sm-1 item"></form></div>';
                echo "<div class='col-sm-1 item'><a href='rc_cookie.php?search="."clear"."'>清除搜尋</a></div>";
                echo "<div class='col-sm-1 item'><h6>" . '帳號：' . "$name</h6></div>";
                echo "<div class='col-sm-1 item'><h6>" . '職務：' . "$level</h6></div>";
                echo "<div class='col-sm-1 item'><a href='pc_logout.php?'><font color='white'><h6>$indate</h6></font></a></div>";
                
                ?>
            </div>
        </div>

    <!-- <table class='rcindex_head02' border='0' align='center'>
        <tr>
        <th align='center' width=150px ><a href='pc_index.php' target='_self'><font color="white">動態表</font></a></th>

            <th align='center' width=150px><a href='rc_index.php' target='_self'><font color="white">線控設定</font></th>
            <th align='center' width=150px><a href='sprint.php' target='_self'><font color="white">衝刺表</font></th>
            <th align='center' width=150px><a href='finalcall.php' target='_self'><font color="white">另開Finalcall</font></th>
            <th align='center' width=150px><a href='pc_push.php?setspword=$check01'><font color="white">PUSH</font></th>
            <th align='center' width=150px><a href='pc_push.php?setspword=$check02'><font color="white">機位OK</font></th>
            <th align='center' width=150px><a href='pc_push.php?setspword=$check03'><font color="white">收訂</font></th>

            <th align='center' width=150px>" . '帳號：' . "$name</th>
            <th align='center' width=150px>" . '群組：' . "$group</th>
            <th align='center' width=150px><a href='pc_account_admin.php?'><font color="white">管理</font></th>
            <th align='center'><a href='pc_logout.php?'><font color="white">$indate</font></th>
        </tr>
    </table> -->
    
   
    <!-- echo "<table  border='0' align='center' >";
    echo "<tr>";
    echo "<td align='right'>搜尋團號、團型、產品名稱及員工備註關鍵字</td>";
    echo "<td><form action='pc_search.php' method='get'>";
    echo "<input  type='text' name='setspword' />";
    echo "<input type='submit' value='search'/>";
    echo "</form>";
    echo "</tr>";
    echo "</table >";


    echo "<table  border='0' align='center' >";
    echo "<tr>";
    echo "<td id='head01_line' align='center'  colspan='11' >線別列表</td>";
    echo "</tr>";
    echo "</table >"; -->
    


    <?php
    $route_sel = "(已選擇-" . $route . ")";
    //echo 'route_sel:'.$route_sel.'<br>';
    $group_sel = "(已選擇-" . $groupcook . ")";
    //echo 'group_sel:'.$group_sel;
    ?>

    <div class="flex-container"></div>
    <div class="rc_head02">
        <div>線別清單.<?php echo $route_sel; ?></div>
        <div class="pc_head02_1 row">
                 <?php
                // echo "<div class='col-sm-4 item'></div>";
               // echo "<div class='col-sm-12 item'><a href='rc_cookie.php?check01=" . $setsp01 . "'><font color=" . $chkcolor01 . "><h6>" . "僅顯示衝刺團" . "</h6></font></a></div>";
                //echo "<div class='col-sm-1 item'><a href='rc_cookie.php?check02=" . $setsp02 . "'><font color=" . $chkcolor02 . "><h6>" . "已設衝刺團" . "</h6></font></a></div>";
                //echo "<div class='col-sm-1 item'><a href='rc_cookie.php?check03=" . $setsp03 . "'><font color=" . $chkcolor03 . "><h6>" . "未設衝刺團" . "</h6></font></a></div>";
                // //echo "<div class='col-sm-1 item'><a href='rc_cookie.php?check04=" . $setsp04 . "'><font color=" . $chkcolor04 . "><h6>" . $check04 . "</h6></font></a></div>";
                // echo "<div class='col-sm-4 item'></div>";
                ?>
            </div>
    </div>

    <div class="row">
        <?php
        $link = create_connection();
        $sql = "SELECT * FROM dynamiclist Group by  route ";
        $result = execute_sql($link, "tw1_yssales", $sql);
        $total_fields = mysqli_num_fields($result);
        $total_records = mysqli_num_rows($result);

        echo '<div class="flex-container"></div>';
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-1 item"><a href=rc_cookie.php?rc_route=' . $row["route"] . ' ' . 'target="_self"><h4>' . $row["route"] . '</h4></a></div>';
        }
        echo '</div>';
        ?>
    </div>


    <div class="flex-container"></div>
    <div class="head02">
        <div>團型清單.<?php echo $group_sel; ?></div>
    </div>
    <div class="row">
        <?php
        $records_per_page = 20;
        if (isset($_GET["page"]))
            $page = $_GET["page"];
        else
            $page = 1;

        if($setsp01=='Y'){
        $records_per_page=1000;
        };
        require_once("dbtools.inc.php");
        $link = create_connection();
        $sql2 = "SELECT * FROM dynamiclist where route = '$route' and groupname not like '%TKT%' and groupname not like '%特別團%' Group by  groupname order by groupname";
        //echo 'route:'.$route;
        $result2 = execute_sql($link, "tw1_yssales", $sql2);
        $total_fields = mysqli_num_fields($result2);
        $total_records = mysqli_num_rows($result2);

        echo '<div class="flex-container"></div>';
        echo '<div class="row">';
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $urltemp = urlencode($row2['groupname']);
            $grouptemp = $row2['groupname'];
            echo '<div class="col-sm-3 item"><a href=rc_cookie.php?rc_groupname=' . $urltemp . ' ' . 'target="_self"><h6>' . $grouptemp . '</h6></a></div>';
            // if( !strpos($grouptemp,'TKT')){
            // echo '<div class="col-sm-3 item"><a href=rc_cookie.php?groupname=' . $urltemp . ' ' . 'target="_self"><h5>' . $grouptemp . '</h5></a></div>';
            // } 排除TKT
        }
        echo '</div>';

        ?>
    </div>

    <div class="flex-container"></div>
    <div class="head03">
        <div>行程清單<?php echo "(搜尋內容:".$search.")"; ?></div>
    </div>
    <table class="table table-striped">
        <thead>
            <th>
                <font color=balck>出發日期
            </th>
            <th>
                <font color=balck>團號
            </th>
            <th>
                <font color=balck>產品名稱(外網)
            </th>
            <th>
                <font color=balck>直客價
            </th>
            <th>
                <font color=balck>同業價
            </th>
            <th>
                <font color=balck>機位數
            </th>
            <th>
                <font color=balck>報名
            </th>
            <th>
                <font color=balck>可售
            </th>
            <th>
                <font color=balck>收訂
            </th>
            <th>
                <font color=balck>狀態
            </th>
            <th>
                <font color=balck>衝刺團
            </th>
            <th>
                <font color=balck>衝刺團備註
            </th>
            <th>
                <font color=balck>FinalCall
            </th>
            <th>
                <font color=balck>Finalcall備註
            </th>
        </thead>


        <div class="row head03_txt">

             <?php
            
            $only_route = $_COOKIE["only_route"];
            if ($only_route == 'Y') {
                $sql3 = "SELECT * FROM dynamiclist where route = '$route' and productname not like '%TKT%' and productname not like '%特別團%' order by depdate ASC";
            }else{
            //$sql = "SELECT * FROM dynamiclist where route = '$route' or groupname='$gruopname' order by date ASC ";
            $sql3 = "SELECT * FROM dynamiclist where groupname = '$groupcook' and groupname not like '%TKT%'  and productname not like '%特別團%' order by depdate ASC";
            }
            if($search!=''){
                //$sql3 = "SELECT * FROM dynamiclist where productname like '%$search%'  or groupid like '%$search%' and productame not like '%TKT%' and productname not like '%特別團%' order by depdate ASC";
                $sql3 = "SELECT * FROM dynamiclist where productname like '%$search%' or groupid like '%$search%' order by depdate ASC";
                
            }
            $result3 = execute_sql($link, "tw1_yssales", $sql3);
            $total_fields = mysqli_num_fields($result3);
            $total_records = mysqli_num_rows($result3);
            $total_pages = ceil($total_records / $records_per_page);
            $started_record = $records_per_page * ($page - 1);
            mysqli_data_seek($result3, $started_record);

            //echo $route."-".$groupcook."-".$total_fields."-".$total_records;
            $j = 1;
            while ($row3 = mysqli_fetch_assoc($result3) and $j <= $records_per_page) {
                if (strpos(strtolower($row3['groupmemo']), $check01) !== false) {
                    $font_color = 'red';
                } else {
                    $font_color = 'black';
                };

                $sql4 = "SELECT * FROM spfclist where groupid = '$row3[groupid]' ";
                $result4 = execute_sql($link, "tw1_yssales", $sql4);
                $row4 = mysqli_fetch_assoc($result4);
                if($setsp01=='Y' and $row4['sp_flag'] != 'Y'){
                    goto JUMP;
                }
                


                echo "<tr>";
                echo "<td align='left'  width='6%'  ><font color=$font_color>" . $row3['depdate'] . "</td>";
                echo "<td align='left'  width='6%'  >" . $row3['groupid'] . "</td>";
                echo "<td align='left'    ><font color=$font_color>" .$row3['productname'] . "</td>";
                echo "<td align='left'  width='6%'  >" . "$" . number_format($row3['customnet']) . "</td>";
                echo "<td align='left'  width='6%'  >" . "$" . number_format($row3['agentnet']) . "</td>";
                echo "<td align='left'  width='4%'  >" . $row3['totalset'] . "</td>";
                echo "<td align='left'  width='4%'  >" . $row3['signup'] . "</td>";
                echo "<td align='left'  width='4%'  >" . $row3['cansales'] . "</td>";
                echo "<td align='left'  width='4%'  >" . $row3['getdeposit'] . "</td>";
                echo "<td align='left'  width='6%'  >" . $row3['status'] . "</td>";
                if ($row4['sp_flag'] == 'Y') {
                 
                    $sp_button = "<button class='button-1'>已上架</button>";
                } else {
                    $sp_button = "<button class='button-2'>未上架</button>";
                };
                echo "<td align='left' width='5%'>" . "<a href='rc_set_sp.php?groupid=$row3[groupid]'>$sp_button</a>" . "</td>";
                echo "<td align='left'  width='8%' >" . $row4['sp_memo'] . "</td>";
                if ($row4['fc_flag'] == 'Y') {

                    $sp_button = "<button class='button-1'>".$row4['fc_type']."</button>";
                } else {
                    $sp_button = "<button class='button-2'>未上架</button>";
                };
                echo "<td align='left' width='5%'>" . "<a href='rc_set_fc.php?groupid=$row3[groupid]'>$sp_button</a>" . "</td>";
                echo "<td align='left'  width='8%' >" . $row4['fc_memo'] . "</td>";
                echo "</tr>";
                JUMP:
                $j++;
            }

            //END: 

            ?>


    </table>
    </div>

    <?php
    echo "</p>";
    echo "<p align='center'>";
    echo "<a href=rc_index.php?page=1>第一頁</a> ";
    for( $i=1 ; $i<=$total_pages ; $i++ ) {
        if ( $page-1 < $i && $i < $page+1 ) {
            $prepage=$i-1;
            echo "<a href=rc_index.php?page=".$prepage.">"."上一頁"."</a> ";
            echo "共 ".$total_records." 筆;目前在第--".$i."--頁 ;共 ".$total_pages." 頁";
            $nextpage=$i+1;
            echo "<a href=rc_index.php?page=".$nextpage.">"."下一頁"."</a> ";
        }
    }
    echo "<a href=rc_index.php?page=".$total_pages.">最末頁</a>";
    echo "</p>";
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_close($link);
    ?>
    

</body>

</html>