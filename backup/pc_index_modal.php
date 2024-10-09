<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    require_once("dbtools.inc.php");
    require_once("indate.php");
    require_once("push.php");
    $route     = $_COOKIE["route"];
    $groupcook     = $_COOKIE["groupname"];

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
    ?>
    <table class='pcindex_head' border='0' align='center'>
        <tr>
            <th align='center'><a href='index.php'>
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
            <th align='center' width=150px><a href='rc_index.php' target='_blank'>
                    <font color="white">線控設定</font>
            </th>
            <th align='center' width=150px><a href='sprint.php' target='_blank'>
                    <font color="white">衝刺表</font>
            </th>
            <th align='center' width=150px><a href='finalcall.php' target='_blank'>
                    <font color="white">另開Finalcall</font>
            </th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check01'>
                    <font color="white">PUSH</font>
            </th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check02'>
                    <font color="white">機位OK</font>
            </th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check03'>
                    <font color="white">收訂</font>
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
    </table>
    <?php
    /*
    echo "<table  border='0' align='center' >";
    echo "<tr>";
    echo "<td align='right'>搜尋團號、團型、產品名稱及員工備註關鍵字</td>";
    echo "<td><form action='pc_search.php' method='get'>";
    echo "<input  type='text' name='keyword' />";
    echo "<input type='submit' value='search'/>";
    echo "</form>";
    echo "</tr>";
    echo "</table >";


    echo "<table  border='0' align='center' >";
    echo "<tr>";
    echo "<td id='head01_line' align='center'  colspan='11' >線別列表</td>";
    echo "</tr>";
    echo "</table >";
    
*/
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


    <div class="flex-container"></div>
    <div class="head02">
        <div>團型清單.<?php echo $group_sel; ?></div>
    </div>
    <div class="row">
        <?php
        require_once("dbtools.inc.php");
        require_once("indate.php");
        require_once("push.php");
        $link = create_connection();
        $records_per_page = 16;
        if (isset($_GET["page"]))
            $page = $_GET["page"];
        else
            $page = 1;

        $sql2 = "SELECT * FROM dynamiclist where route = '$route' Group by  groupname ";
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
                <font color=balck>詳細內容
            </th>
            <th>
                <font color=balck>衝刺團
            </th>
            <!-- <th>
                <font color=balck>衝刺團備註
            </th> -->
            <th>
                <font color=balck>FinalCall
            </th>
        </thead>


        <div class="row head03_txt">

            <?php
            $only_route = $_COOKIE["only_route"];
            if ($only_route == 'Y') {
                goto END;
            }
            //$sql = "SELECT * FROM dynamiclist where route = '$route' or groupname='$gruopname' order by date ASC ";
            $sql3 = "SELECT * FROM dynamiclist where groupname = '$groupcook'  order by depdate ASC";
            $result3 = execute_sql($link, "tw1_yssales", $sql3);
            $total_fields = mysqli_num_fields($result3);
            $total_records = mysqli_num_rows($result3);
            $total_pages = ceil($total_records / $records_per_page);
            $started_record = $records_per_page * ($page - 1);
            mysqli_data_seek($result, $started_record);

            //echo $route."-".$groupcook."-".$total_fields."-".$total_records;
            $j = 1;
            while ($row3 = mysqli_fetch_assoc($result3) and $j <= $records_per_page) {
                if (strpos(strtolower($row3['groupmemo']), $check01) !== false) {
                    $font_color = 'red';
                } else {
                    $font_color = 'black';
                };
                if (strpos(strtolower($row3['groupmemo']), $check03) !== false) {
                    $lock = "<img src='image/lock.png' >";
                } else {
                    $lock = "";
                };

                echo "<tr>";
                echo "<td align='left'  width='8%'  ><font color=$font_color>" . $row3['depdate'] . "</td>";
                echo "<td align='left'  width='5%'  >" . $row3['groupid'] . "</td>";
                echo "<td align='left'  width='25%'  ><font color=$font_color>" . $lock . $row3['productname'] . "</td>";
                echo "<td align='left'  width='6%'  >" . "$" . $row3['customnet'] . "</td>";
                echo "<td align='left'  width='6%'  >" . "$" . $row3['agentnet'] . "</td>";
                echo "<td align='left'  width='5%'  >" . $row3['totalset'] . "</td>";
                echo "<td align='left'  width='5%'  >" . $row3['signup'] . "</td>";
                echo "<td align='left'  width='5%'  >" . $row3['cansales'] . "</td>";
                echo "<td align='left'  width='5%'  >" . $row3['getdeposit'] . "</td>";
                echo "<td align='left'  width='10%'  >" . $row3['status'] . "</td>";
                ?>
                <td align='left' ><button data-id='<?php echo $row3['SN'];?>' class='userinfo btn btn-success'>Info</a></td>;
                <?php
                if ($row3['sp_flag'] == 'Y') {

                    $sp_button = "<button class='button-1'>有</button>";
                } else {
                    $sp_button = "<button class='button-2'>沒</button>";
                };
                echo "<td align='left' width='4%'>" . "$sp_button" . "</td>";
                //echo "<td align='left'  width='10%'  >" . $row3['sp_memo'] . "</td>";
                echo "<td align='left' width='4%'>" . "<button class='button-2'>沒</button>"  . "</td>";
                echo "</tr>";
                $j++;
            }

            END:

            ?>


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

    ?>
     <!-- 跳出視窗內容 -->
     <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h3 class="modal-title">詳細內容</h3>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <!-- Body -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>出發日期:<?php echo $row3['depdate']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>團號:<?php echo $row3['groupid']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>團型:<?php echo $row3['groupname']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>產品名稱:<?php echo $row3['productname']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>直客價:<?php echo $row3['customnet']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>同業價:<?php echo $row3['agentnet']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>機位數:<?php echo $row3['totalset']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>報名:<?php echo $row3['signup']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>可售:<?php echo $row3['cansales']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>收訂數:<?php echo $row3['getdeposit']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>狀態:<?php echo $row3['status']?></td>    
                        </div>
                        <div class="form-group">
                            <td align='left'  width='8%'  ><font color=$font_color>員工備註:<?php echo $row3['groupmemo']?></td>    
                        </div>

                    </form>
                </div>
                <!-- Footer -->
            </div>
        </div>
    </div>
    <?php
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_close($link);
    ?>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.userinfo').click(function(){
                var userid = $(this).fate('id');
                $.ajax({
                    url:'ajaxfile.php',
                    type: 'post',
                    data:{userid:userid},
                    success: function(response){
                    $('.modal-body').html(response);
                    $('#empModal').modal('show');
                }
                });

            });
        });

    </script>

</body>

</html>