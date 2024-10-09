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
    $groupid = $_GET["groupid"];
    //echo $groupid;
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = "SELECT * FROM dynamiclist where groupid='$groupid'";
    $result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class='rc_set_up_outer'>
        <div class='rc_set_up_inner'>
            <form name="form1" method="post" action="rc_set_sp_update.php?groupid=<?php echo $row['groupid'] ?>">
                <table border="0" width="900" align="center" cellspacing="0">
                    <tr>
                        <td align="center" colspan='2'>
                            <h4>上架衝刺團</h4>
                        </td>
                    </tr>
                    <tr align="center">
                        <td align="right" width="30%" bgcolor="#FFF000">出發日期：</td>
                        <td align="left"><?php echo $row['depdate'] ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="30%" bgcolor="#FFF000">團號：</td>
                        <td align="left"><?php echo $row['groupid'] ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="30%" bgcolor="#FFF000">團名：</td>
                        <td align="left"><?php echo $row['groupname'] ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="30%" bgcolor="#FFF000">外網團名：</td>
                        <td align="left"><?php echo $row['productname'] ?></td>
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
                    ?>
                    <tr>
                        <td align="right" width="30%" bgcolor="#FFF000">衝刺團目前上架?：</td>
                        <td align="left"><?php echo $row2['sp_flag'] ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="30%" bgcolor="#FFF000" valign="top">衝刺團備註(20個中文字)：</td>
                        <td align="left"><textarea name="sp_memo" row="6" cols="70"><?php echo $row2['sp_memo'] ?></textarea></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="SN" value=$SN>
                    </tr>

                    <tr bgcolor="#FFF0c0" align="right">
                        <td align="center" colspan='2'><input type="submit" style="height:30px; width:80px" size="20" value="輸入"></td>
                    </tr>
                </table>
            </form>
            <?php
            mysqli_free_result($result);
            mysqli_free_result($result2);
            mysqli_free_result($result3);
            mysqli_free_result($result4);
            mysqli_close($link);
            ?>
        </div>
    </div>
</body>

</html>