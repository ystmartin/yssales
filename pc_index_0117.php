<!DOCTYPE html>
<html>

<head>
    <title>網頁動態表</title>
    <!-- 引入 Bootstrap CSS -->

    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">



    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>

<body>
    <?php

    if($_COOKIE["passed"]!="TURE"){
        echo "<script type ='text/javascript'>";
        echo "alert('無法登入!!');";
        echo "history.back();";
        echo "</script>";
        header("Location:pc_login.php");

    }
//echo $_COOKIE["passed"];
$name=$_COOKIE["name"];
$level=$_COOKIE["level"];
date_default_timezone_set("Asia/Shanghai");

    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = "SELECT * FROM keyword ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $check01 = $row['check01'];
    $check02 = $row['check02'];
    $check03 = $row['check03'];
    $check04 = $row['check04'];



    $key01     = $_COOKIE["key01"];
    if ($key01 == "Y") {
        $key01 = "Y";
    } else {
        $key01 = "N";
    }
    $key02     = $_COOKIE["key02"];
    if ($key02 == "Y") {
        $key02 = "Y";
    } else {
        $key02 = "N";
    }
    $key03     = $_COOKIE["key03"];
    if ($key03 == "Y") {
        $key03 = "Y";
    } else {
        $key03 = "N";
    }
    $key04     = $_COOKIE["key04"];
    if ($key04 == "Y") {
        $key04 = "Y";
    } else {
        $key04 = "N";
    }
    //echo 'key01:'.$key01.'-'.'key02:'.$key02.'-'.'key03:'.$key03.'-'.'key04:'.$key04;


    if ($key01 != "Y") {
        $chkcolor01 = "white";
    } else {
        $chkcolor01 = "blue";
    }
    if ($key02 != "Y") {
        $chkcolor02 = "white";
    } else {
        $chkcolor02 = "blue";
    }
    if ($key03 != "Y") {
        $chkcolor03 = "white";
    } else {
        $chkcolor03 = "blue";
    }
    if ($key04 != "Y") {
        $chkcolor04 = "white";
    } else {
        $chkcolor04 = "blue";
    }


    $route     = $_COOKIE["route"];
    //echo 'route:'.$route;
    $groupcook     = $_COOKIE["groupname"];
    ?>
    <!-- <table class='pcindex_head' border='0' align='center'>
        <tr>
            <th align='center'><a href='pc_index_modal.php'>
                    <h1 align='center'>
                        <font color='white'> 網頁動態表</font>
                    </h1>
            </th>

        </tr>
    </table> -->

    <div class="flex-container"></div>
        <div class="pc_head01">
            <div class="row">
                <dvi>
                    <h1 align='center'>
                        <font color='white'> 網頁動態表</font>
                    </h1>
                </div>
            </div>

        </div>
    </div>


    <!-- <table class='pcindex_head02' border='0' align='center'>
        <tr>
            <th align='center' width=150px><a href='pc_index.php' target='_self'>
                    <font color="white">動態表</font>
                </a></th>
            <th align='center' width=150px><a href='rc_index.php' target='_self'>
                    <font color="white">線控設定</font>
            </th>
            <th align='center' width=150px><a href='sprint.php' target='_blank'>
                    <font color="white">衝刺表</font>
            </th>
            <th align='center' width=150px><a href='finalcall.php' target='_blank'>
                    <font color="white">Finalcall</font>
            </th>
            <th align='center' width=150px>" . '帳號：' . "$name</th>
            <th align='center' width=150px>" . '群組：' . "$group</th>
            <th align='center' width=150px><a href='pc_account_admin.php?'>
                    <font color="white">管理</font>
            </th>
            <th align='center'><a href='pc_logout.php?'>
                    <font color="white">$indate</font>
            </th>
        </tr>
    </table> -->

    <tbody>

        <div class="flex-container"></div>
        <div class="pc_head01_1 container-fluid">
            <div class="row">
                <?php
                echo '<div class="col-sm-1 item"></div>';
                //echo "<div class='col-sm-1 item'><a href='pc_index.php' target='_self'><font color='white'><h6>動態表</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='rc_index.php' target='_self'><font color='white'><h6>線控設定</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='sprint.php' target='_blank'><font color='white'><h6>衝刺表</h6></font></a></div>";
                //echo "<div class='col-sm-1 item'><a href='finalcall.php' target='_blank'><font color=white><h6>Finalcall</h6></font></a></div>";
                echo    '<div class="col-sm-1 item"><form name="form1" method="post" action="pc_index.php"></div>';
                //echo     '<table border="0" width="200" align="center" cellspacing="0">';
                echo            '<div class="col-sm-3 item">搜尋產品名稱或團號：<input type="text" name="search"><input type="submit" value="輸入"></div>';
                //echo    '</table>';
                echo    '<div class="col-sm-1 item"></form></div>';
                echo "<div class='col-sm-1 item'><a href='pc_account_admin.php?'><font color='white'><h6>管理</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><h6>" . '帳號：' . "$name</h6></div>";
                echo "<div class='col-sm-1 item'><h6>" . '職務：' . "$level</h6></div>";
                echo "<div class='col-sm-1 item'><a href='pc_logout.php?'><font color='white'><h6>登出</h6></font></a></div>";
                //echo '<div class="col-sm-1 item"></div>';
                ?>
            </div>
        </div>
        <?php

        $route_sel = "(已選擇-" . $route . ")";
        //echo 'route_sel:'.$route_sel.'<br>';
        $group_sel = "(已選擇-" . $groupcook . ")";
        //echo 'group_sel:'.$group_sel;
        ?>

        <div class="flex-container"></div>
        <div class="pc_head02 container-fluid">
            <div>線別清單<?php echo $route_sel; ?></div>
            <div class="pc_head02_1 row">
                 <?php
                echo "<div class='col-sm-4 item'></div>";
                echo "<div class='col-sm-1 item'><a href='pc_cookie.php?check01=" . $key01 . "'><font color=" . $chkcolor01 . "><h6>" . $check01 . "</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='pc_cookie.php?check02=" . $key02 . "'><font color=" . $chkcolor02 . "><h6>" . $check02 . "</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='pc_cookie.php?check03=" . $key03 . "'><font color=" . $chkcolor03 . "><h6>" . $check03 . "</h6></font></a></div>";
                echo "<div class='col-sm-1 item'><a href='pc_cookie.php?check04=" . $key04 . "'><font color=" . $chkcolor04 . "><h6>" . $check04 . "</h6></font></a></div>";
                echo "<div class='col-sm-4 item'></div>";
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
            echo '<div class="col-sm-1 item"><a href=pc_cookie.php?route=' . 'ALL' . ' ' . 'target="_self"><h4>' . '全線' . '</h4></a></div>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-sm-1 item"><a href=pc_cookie.php?route=' . $row["route"] . ' ' . 'target="_self"><h4>' . $row["route"] . '</h4></a></div>';
            }
            echo '</div>';
            ?>
        </div>
        <div class="pc_head03">
            <div>團型清單.<?php echo $group_sel; ?></div>
        </div>
        <div class="row">
            <?php
            $records_per_page = 20;
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;

            $search   = $_POST["search"];
            if($search!=''){
                $records_per_page = 1000;
            }


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
                echo '<div class="col-sm-3 item"><a href=pc_cookie.php?groupname=' . $urltemp . ' ' . 'target="_self"><h6>' . $grouptemp . '</h6></a></div>';
                // if( !strpos($grouptemp,'TKT')){
                // echo '<div class="col-sm-3 item"><a href=rc_cookie.php?groupname=' . $urltemp . ' ' . 'target="_self"><h5>' . $grouptemp . '</h5></a></div>';
                // } 排除TKT
            }
            echo '</div>';

            ?>
        </div>
        <div class="flex-container"></div>
        <div class="pc_head04">
            <div>行程清單</div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th><div class="pc_head04_1">出發日期 </div></th>
                    <th><div class="pc_head04_1">產品名稱(外網)</div></th>
                    <th><div class="pc_head04_1">直客價</div></th>
                    <th><div class="pc_head04_1">同業價</div></th>
                    <th><div class="pc_head04_1">機位數</div></th>
                    <th><div class="pc_head04_1">報名</div></th>
                    <th><div class="pc_head04_1">可售</div></th>
                    <th><div class="pc_head04_1">收訂</div></th>
                    <th><div class="pc_head04_1">狀態</div></th>
                    <th><div class="pc_head04_1">員工備註</div></th>
                    <th><div class="pc_head04_1">顯示詳情</div></th>
                    <th><div class="pc_head04_1">衝刺團</div></th>
                    <th><div class="pc_head04_1">衝刺團備註</div></th>
                    <th><div class="pc_head04_1">FinalCall</div></th>
                </tr>
            </thead>
            <tbody>
                <div class="row head03_txt">
                    <?php

                    $team00 = "groupname = '$groupcook'";
                    if ($key01 == "Y") {
                        $team01 = "and groupmemo like '%$check01%'";
                    } else {
                        $team01 = "";
                    }
                    if ($key02 == "Y") {
                        $team02 = "and groupmemo like '%$check02%'";
                    } else {
                        $team02 = "";
                    }
                    if ($key03 == "Y") {
                        $team03 = "and groupmemo like '%$check03%'";
                    } else {
                        $team03 = "";
                    }
                    if ($key04 == "Y") {
                        $team04 = "and getdeposit > 0 ";
                    } else {
                        $team04 = "";
                    }

                    if ($route == '') {
                        $route = 'ALL';
                    }

                    if ($route == 'ALL' and $groupcook == '') {
                        $setroute = '';
                        $setgroupname = '';
                        $condtion = ' where ';
                    }
                    if ($route != 'ALL' and $groupcook == '') {
                        $setroute = ' where route=' . '"' . $route . '"';
                        $setgroupname = '';
                        $condtion = ' and ';
                    }
                    if ($route != 'ALL' and $groupcook != '') {
                        $setroute = ' where route=' . '"' . $route . '"';
                        $setgroupname = ' and groupname=' . '"' . $groupcook . '"';
                        $condtion = ' and ';
                    }

                    

                    $sql3 = "SELECT * FROM dynamiclist" . $setroute . $setgroupname . $condtion . "groupname not like '%TKT'" . $team01 . $team02 . $team03 . $team04 . "order by depdate ASC";
                    $search   = $_POST["search"];
                    
                    if($search!=''){
                        $sql3 = "SELECT * FROM dynamiclist where productname like '%$search%'  or groupid like '%$search%' and ". "groupname not like '%TKT'" . $team01 . $team02 . $team03 . $team04 . "order by depdate ASC";

                    }
                    //echo $sql3;
                    $result3 = execute_sql($link, "tw1_yssales", $sql3);
                    $total_fields = mysqli_num_fields($result3);
                    $total_records = mysqli_num_rows($result3);
                    $total_pages = ceil($total_records / $records_per_page);
                    $started_record = $records_per_page * ($page - 1);
                    mysqli_data_seek($result3, $started_record);

                    // 從資料庫中取得資料

                    if ($result3->num_rows > 0) {
                        $j = 1;
                        while ($row3 = $result3->fetch_assoc() and $j <= $records_per_page) {
                            echo "<tr>";
                            echo "<td width='6%'>" . $row3['depdate'] . "</td>";
                            //echo "<td width='5%'>" . $row3['groupid'] . "</td>";
                            echo "<td width='25%'><a href='https://www.ystravel.com.tw/products/group/detail/$row3[groupid]' target=_blank>" . $row3['productname'] . "</td>";
                            echo "<td width='4%' align='right'>" . "$" . number_format($row3['customnet']) . "</td>";
                            echo "<td width='4%' align='right'>" . "$" . number_format($row3['agentnet']) . "</td>";
                            echo "<td width='4%' align='right'>" . $row3['totalset'] . "</td>";
                            echo "<td width='3%' align='right'>" . $row3['signup'] . "</td>";
                            echo "<td width='3%' align='right'>" . $row3['cansales'] . "</td>";
                            echo "<td width='3%' align='right'>" . $row3['getdeposit'] . "</td>";
                            echo "<td width='6%'>" . $row3['status'] . "</td>";

                            $groupmemo = $row3['groupmemo'];
                            if(strlen($groupmemo)>40){
                                $etc="...more!";
                            }else{
                                $etc="";
                            }

                            $groupmemo = substr($groupmemo, 0, 40);

                            echo "<td width='14%'>" . $groupmemo .$etc. "</td>";
                            echo "<td width='6%'><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal" . $row3['SN'] . "'>顯示詳細</button></td>";


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
                            $sp_memo = substr($sp_memo, 0, 40);

                            echo "<td  width='14%'>" . $sp_memo . "</td>";
                            //echo "<td align='left'  width='10%'  >" . $row3['sp_memo'] . "</td>";
                            echo "<td align='center' width='4%'>" . "<div class='pc_button-2'>沒</div>"  . "</td>";
                            echo "</tr>";
                            $j++;
                        }
                        $result3->data_seek(0);
                        // Modal 模態視窗
                        while ($row3 = $result3->fetch_assoc()) {
                            echo "<div class='modal fade' id='myModal" . $row3['SN'] . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
                                        echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                                echo "<div class='modal-header'>";
                                                echo "<h4 class='modal-title' id='myModalLabel'>" . $row3['groupid'] . "</h4>";
                                                echo "<button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                                                echo "</div>";

                                                echo "<div class='modal-body'>";
                                                echo "<p>出發日期: " . $row3['depdate'] . "</p>";
                                                //echo "<p>團號: " . $row3['groupid'] . "</p>";
                                                echo "<p>團型名稱: " . $row3['groupname'] . "</p>";
                                                echo "<p>產品名稱: " . $row3['productname'] . "</p>";
                                                echo "<p>直售價: " . "$" .number_format($row3['customnet']) . "</p>";
                                                echo "<p>同業價: " . "$" .number_format($row3['agentnet']) . "</p>";
                                                echo "<p>機位總數: " . $row3['totalset'] . "</p>";
                                                echo "<p>報名數: " . $row3['signup'] . "</p>";
                                                echo "<p>可售數: " . $row3['cansales'] . "</p>";
                                                echo "<p>收訂數: " . $row3['getdeposit'] . "</p>";
                                                echo "<p>狀態: " . $row3['status'] . "</p>";
                                                echo "<p>員工備註: " . $row3['groupmemo'] . "</p>";
                                                echo "</div>";

                                                // echo "<div class='modal-footer'>";
                                                // echo "<button type='button' class='btn btn-default' data-bs-dismiss='modal'>關閉</button>";
                                                // echo "</div>";
                                            echo "</div>";
                                        echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "並無正確行程可顯示";
                    }
                    
                    ?>
            </tbody>
        </table>
        </div>
        <?php
        echo "</p>";
        echo "<p align='center'>";
        echo "<a href=pc_index.php?page=1>第一頁</a> ";
        for( $i=1 ; $i<=$total_pages ; $i++ ) {
            if ( $page-1 < $i && $i < $page+1 ) {
                $prepage=$i-1;
                echo "<a href=pc_index.php?page=".$prepage.">"."上一頁"."</a> ";
                echo "共 ".$total_records." 筆;目前在第--".$i."--頁 ;共 ".$total_pages." 頁";
                $nextpage=$i+1;
                echo "<a href=pc_index.php?page=".$nextpage.">"."下一頁"."</a> ";
            }
        }
        echo "<a href=pc_index.php?page=".$total_pages.">最末頁</a>";
        echo "</p>";
        //echo '<br>';
        echo "<p align='center'><h8>";
        echo '程式版本:Rev.2.0.0,程式更新日期2024/1/17';
        echo "</h8></p>";



        mysqli_free_result($result);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
        mysqli_free_result($result4);
        mysqli_close($link);
        ?>
</body>

</html>