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
        $chkcolor01 = "red";
    }
    if ($key02 != "Y") {
        $chkcolor02 = "white";
    } else {
        $chkcolor02 = "red";
    }
    if ($key03 != "Y") {
        $chkcolor03 = "white";
    } else {
        $chkcolor03 = "red";
    }
    if ($key04 != "Y") {
        $chkcolor04 = "white";
    } else {
        $chkcolor04 = "red";
    }




    // require_once("indate.php");
    // require_once("push.php");
    $route     = $_COOKIE["route"];
    $groupcook     = $_COOKIE["groupname"];
    ?>
    <table class='pcindex_head' border='0' align='center'>
        <tr>
            <th align='center'><a href='pc_index_modal.php'>
                    <h1 align='center'>
                        <font color='white'> 網頁動態表</font>
                    </h1>
            </th>

        </tr>
    </table>

    <table class='pcindex_head02' border='0' align='center'>
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
            <?php
            echo "<th align='center' width=150px><a href='pc_cookie.php?check01=" . $key01 . "'><font color=" . $chkcolor01 . ">" . $check01 . "</font></th>";
            ?>
            <?php
            echo "<th align='center' width=150px><a href='pc_cookie.php?check02=" . $key02 . "'><font color=" . $chkcolor02 . ">" . $check02 . "</font></th>";
            ?>
            <?php
            echo "<th align='center' width=150px><a href='pc_cookie.php?check03=" . $key03 . "'><font color=" . $chkcolor03 . ">" . $check03 . "</font></th>";
            ?>
            <?php
            echo "<th align='center' width=150px><a href='pc_cookie.php?check04=" . $key04 . "'><font color=" . $chkcolor04 . ">" . $check04 . "</font></th>";
            ?>

            <th align='center' width=150px>" . '帳號：' . "$name</th>
            <th align='center' width=150px>" . '群組：' . "$group</th>
            <th align='center' width=150px><a href='pc_account_admin.php?'>
                    <font color="white">管理</font>
            </th>
            <th align='center'><a href='pc_logout.php?'>
                    <font color="white">$indate</font>
            </th>
        </tr>
    </table>
    <tbody>
        <?php

        $route_sel = "(已選擇-" . $route . ")";
        //echo 'route_sel:'.$route_sel.'<br>';
        $group_sel = "(已選擇-" . $groupcook . ")";
        //echo 'group_sel:'.$group_sel;
        ?>

        <div class="flex-container"></div>
        <div class="head01">
            <div>線別清單.<?php echo $route_sel; ?></div>
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
                echo '<div class="col-sm-1 item"><a href=pc_cookie.php?route=' . $row["route"] . ' ' . 'target="_self"><h4>' . $row["route"] . '</h4></a></div>';
            }
            echo '</div>';
            ?>
        </div>
        <div class="head02">
            <div>團型清單.<?php echo $group_sel; ?></div>
        </div>
        <div class="row">
            <?php
            $records_per_page =20;
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;

            $sql2 = "SELECT * FROM dynamiclist where route = '$route' and groupname not like '%TKT' Group by  groupname ";
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
        <div class="head03">
            <div>行程清單</div>
        </div>
        <div class="head03-1">
            <?php
            //echo "<td align='center' width=150px><a href='pc_cookie.php?check01=" . $key01 . "'><font color=" . $chkcolor01 . ">" . $check01 . "</font></a></td>";
            //echo "    ";
            //echo "<td align='center' width=150px><a href='pc_cookie.php?check02=" . $key02 . "'><font color=" . $chkcolor02 . ">" . $check02 . "</font></a></td>";
            //echo "    ";
            //echo "<td align='center' width=150px><a href='pc_cookie.php?check03=" . $key03 . "'><font color=" . $chkcolor03 . ">" . $check03 . "</font></a></td>";
            //echo "    ";
            //echo "<td align='center' width=150px><a href='pc_cookie.php?check04=" . $key04 . "'><font color=" . $chkcolor04 . ">" . $check04 . "</font></a></td>";
            ?>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <font color=balck>出發日期
                    </th>
                    <!-- <th>
                        <font color=balck>團號
                    </th> -->
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
                        <font color=balck>員工備註
                    </th>
                    <th>
                        <font color=balck>顯示詳情
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
                </tr>
            </thead>
            <tbody>
                <div class="row head03_txt">
                    <?php
                    $only_route = $_COOKIE["only_route"];
                    if ($only_route == 'Y') {
                        goto END;
                    }

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



                    $sql3 = "SELECT * FROM dynamiclist where " . $team00 . $team01 . $team02 . $team03 . $team04 . " order by depdate ASC";
                    //$sql3 = "SELECT * FROM dynamiclist where groupname = '$groupcook' order by depdate ASC";

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
                            echo "<td width='25%'>" . $row3['productname'] . "</td>";
                            echo "<td width='4%'>" . "$" . $row3['customnet'] . "</td>";
                            echo "<td width='4%'>" . "$" . $row3['agentnet'] . "</td>";
                            echo "<td width='4%'>" . $row3['totalset'] . "</td>";
                            echo "<td width='3%'>" . $row3['signup'] . "</td>";
                            echo "<td width='3%'>" . $row3['cansales'] . "</td>";
                            echo "<td width='3%'>" . $row3['getdeposit'] . "</td>";
                            echo "<td width='6%'>" . $row3['status'] . "</td>";

                            $groupmemo = $row3['groupmemo'];
                            $groupmemo = substr($groupmemo, 0, 40);

                            echo "<td width='14%'>" . $groupmemo . "</td>";
                            echo "<td width='6%'><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal" . $row3['SN'] . "'>顯示詳細</button></td>";
                    
                            
                            $sql4 = "SELECT * FROM spfclist where groupid = '$row3[groupid]'";
                            $result4 = execute_sql($link, "tw1_yssales", $sql4);
                            $row4 = mysqli_fetch_assoc($result4);
                  
                            if ($row4['sp_flag'] == 'Y') {

                                $sp_button = "<button class='pc_button-1'>有</button>";
                            } else {
                                $sp_button = "<button class='pc_button-2'>沒</button>";
                            };
                            
                            echo "<td align='center' width='4%'>" . "$sp_button" . "</td>";
                            $sp_memo = $row4['sp_memo'];
                            $sp_memo = substr($sp_memo, 0, 40);

                            echo "<td  width='14%'>" . $sp_memo . "</td>";
                            //echo "<td align='left'  width='10%'  >" . $row3['sp_memo'] . "</td>";
                            echo "<td align='csnter' width='4%'>" . "<button class='pc_button-2'>沒</button>"  . "</td>";
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
                            echo "<p>直售價: " . "$" . $row3['customnet'] . "</p>";
                            echo "<p>同業價: " . "$" . $row3['agentnet'] . "</p>";
                            echo "<p>機位總數: " . $row3['totalset'] . "</p>";
                            echo "<p>報名數: " . $row3['signup'] . "</p>";
                            echo "<p>可售數: " . $row3['cansales'] . "</p>";
                            echo "<p>收訂數: " . $row3['getdeposit'] . "</p>";
                            echo "<p>狀態: " . $row3['status'] . "</p>";
                            echo "<p>員工備註: " . $row3['groupmemo'] . "</p>";
                            echo "<p>衝刺團: " . $row3['sp_flag'] . "</p>";
                            echo "<p>衝刺備註: " . $row3['sp_memo'] . "</p>";

                            echo "</div>";
                            echo "<div class='modal-footer'>";
                            echo "<button type='button' class='btn btn-default' data-bs-dismiss='modal'>關閉</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "0 結果";
                    }
                    END:
                    ?>
            </tbody>
        </table>
        </div>
        <?php
        echo "<p align='center'>";
        if ($page > 1)
            echo "<a href='pc_index.php?page=" . ($page - 1) . "'>上一頁</a> ";

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page)
                echo "$i ";
            else
                echo "<a href='pc_index.php?page=$i'>$i</a> ";
        }

        if ($page < $total_pages)
            echo "<a href='pc_index.php?page=" . ($page + 1) . "'>下一頁</a> ";

        echo "</p>";

        mysqli_free_result($result);
        mysqli_free_result($result2);
        mysqli_free_result($result3);
        mysqli_close($link);

        ?>


</body>

</html>