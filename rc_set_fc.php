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

    <link rel="stylesheet" type="text/css" href="rc_fc.css">
</head>

<body>
    <?php
    require_once("dbtools.inc.php");
    //$today = strtotime(date('Y-m-d'));
    //echo "今天".$today."日;";
    $link = create_connection();
    $sql = "SELECT count(*) as count FROM spfclist where fc_flag='Y' and fc_type='即將成團' and fc_setoff > CURDATE() ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $willok = $row['count'];
    $sql = "SELECT count(*) as count FROM spfclist where fc_flag='Y' and fc_type='已成團' and fc_setoff > CURDATE() ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $nowisok = $row['count'];
    $sql = "SELECT count(*) as count FROM spfclist where fc_flag='Y' and fc_type='推薦行程' and fc_setoff > CURDATE() ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    $prompt = $row['count'];
    ?>

    <table class="rc_fc">
        <tr>
            <td align="center" colspan='2'>
                <h4>上架FinalCall團</h4>
            </td>
        </tr>
        <tr>
            <td><?php echo "-即將成團-目前有" . $willok . "團;"; ?></td>
        </tr>
        <tr>
            <td><?php echo "-已成團-目前有" . $nowisok . "團;"; ?></td>
        </tr>
        <tr>
            <td><?php echo "-推薦行程-目前有" . $prompt . "團;"; ?></td>
        </tr>
        <tr>
            <td><?php echo "每個項目最多只顯示30團，用日期排序，第30團之後的即不會顯示,<br>須待前面有行程到期(14天)或手動下架,方能往前遞補" ?></td>
        </tr>
    </table>

    <?php
    $type = '已成團';
    $groupid = $_GET["groupid"];

    if ($groupid == "") {
        $groupid = $_COOKIE["fcgroupid"];
    } else {
        setcookie("fcgroupid", $groupid, time() + 3600);
    }
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = "SELECT * FROM dynamiclist where groupid='$groupid'";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <table class="rc_fc">
        <form name="form1" method="post" action="rc_set_fc_update.php?groupid=<?php echo $row['groupid'] ?>">


            <tr align="center">
                <td align="right" width="30%" bgcolor="#FFF000">出發日期：</td>
                <!-- <td align="left"><?php echo $row['depdate']; ?></td> -->
                <td align="left"><input type="text" name="fc_depdate" value=<?php echo $row['depdate']; ?> readonly>唯讀</td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">團號：</td>
                <td align="left"><input type="text" name="groupid" value=<?php echo $groupid; ?> readonly>唯讀</td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">團名：</td>
                <td align="left"><?php echo $row['groupname'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">外網團名：</td>
                <!-- <td align="left" ><input type="text" name="fc_pname" value=<?php echo ($row['productname']); ?> readonly>唯讀</td> -->
                <td align="left"><input type="text" name="fc_pname" value=<?php echo urlencode($row['productname']); ?> readonly>唯讀</td>
                <!-- urlencode是解決空格會切斷的問題 -->
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">直售價：</td>
                <!-- <td align="left"><?php echo $row['customnet']; ?></td> -->
                <td align="left"><input type="text" name="fc_price" value=<?php echo $row['customnet']; ?> readonly>唯讀</td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">總機位：</td>
                <td align="left"><?php echo $row['totalset'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">保留機位：</td>
                <td align="left"><?php echo $row['reserve'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">已報名：</td>
                <td align="left"><?php echo $row['signup'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">可售：</td>
                <td align="left"><?php echo $row['cansales'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">收訂數：</td>
                <td align="left"><?php echo $row['getdeposit'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">狀態：</td>
                <td align="left"><?php echo $row['status'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000" valign="top">員工備註：</td>
                <td align="left"><?php echo $row['groupmemo'] ?></td>
            </tr>
            <?php
            $sql2 = "SELECT * FROM spfclist where groupid='$groupid'";
            $result2 = execute_sql($link, "tw1_yssales", $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            //$row2 是取得FC表資訊
            ?>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">FC團目前上架?：</td>
                <td align="left"><?php echo $row2['fc_flag'] ?></td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000" valign="top">FC團截止日：<br>(上架後14天自動下架)</td>
                <?php $endday = date("Y-m-d", strtotime("+14 day")); ?>
                <td align="left"><input type="text" name="fc_setoff" value=<?php echo $endday ?> readonly>唯讀</td>
            </tr>
            <?php

            if ($fctype == NUll) {
                $fctype = $_COOKIE["fctype"];
            }

            $sql3 = "SELECT * FROM type ";
            $result3 = execute_sql($link, "tw1_yssales", $sql3);
            $total_records = mysqli_num_rows($result3);

            //$row3是取得狀態表資訊
            ?>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000">FC團類別：</td>
                <td>

                    <?php
                    $j = 1;
                    while ($row3 = mysqli_fetch_assoc($result3) and $j <= $total_records) {
                        echo '<a href=rc_set_fc_cook.php?fctype=' . $row3["fctype"] . '>' . $row3['fctype'] . '</a>';
                        echo "-";
                        $j++;
                    }
                    echo '<br>' . '已選擇';
                    ?>
                    <input type="text" name="fc_type" value=<?php echo $fctype; ?>>

                </td>
            </tr>


            <?php

            if ($fcairline == NUll) {
                $fcairline = $_COOKIE["fcairline"];
            }
            $sql4 = "SELECT * FROM airline ";
            $result4 = execute_sql($link, "tw1_yssales", $sql4);
            $total_records = mysqli_num_rows($result4);
            //$row4是取得航空公司表資訊
            ?>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000" valign="top">FC團航空公司名稱：</td>
                <td>

                    <?php
                    $j = 1;
                    while ($row4 = mysqli_fetch_assoc($result4) and $j <= $total_records) {
                        echo '<a href=rc_set_fc_cook.php?fcairline=' . $row4["fcairline"] . '>' . $row4['fcairline'] . '</a>';
                        echo "-";
                        $j++;
                    }
                    echo '<br>' . '已選擇';
                    ?>
                    <input type="text" name="fc_airline" value=<?php echo $fcairline; ?>>

                </td>
            </tr>
            <tr>
                <td align="right" width="30%" bgcolor="#FFF000" valign="top">FC團備註:(限30個中英文字<BR>,超過會截掉,用半形逗點做分隔)</td>
                <td align="left"><textarea name="fc_memo" row="6" cols="70"><?php echo $row2['fc_memo']; ?></textarea></td>
            </tr>
            <tr>
                <input type="hidden" name="SN" value=$SN>
            </tr>

            <tr bgcolor="#FFF0c0" align="right">
                <td align="center" colspan='2'><input type="submit" style="height:30px; width:80px" size="20" value="輸入"></td>
            </tr>
        </form>
    </table>


    <?php
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_free_result($result4);
    mysqli_close($link);
    ?>

</body>

</html>