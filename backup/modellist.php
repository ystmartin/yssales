<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- 連接CSS -->

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
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
*/
    $records_per_page = 50;
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;
    if (isset($_GET["route"]))
        $route = $_GET["route"];
           
    ?>
    <table border='0' align='center'>
        <tr>
            <th align='center'><a href='index.php'>
                    <h1 align='center'>
                        <font color='white'> 衝刺團及FinalCall</font>
                    </h1>
            </th>

        </tr>
    </table>

    <table border='0' align='center'>
        <tr>
            <th align='center' width=150px><a href='javascript:history.back()'>回上一頁</th>
            <th align='center' width=150px><a href='newindex.php'>新動態表</th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check01'>$check01</th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check02'>$check02</th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check03'>$check03</th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check04'>$check04</th>
            <th align='center' width=150px><a href='pc_push.php?keyword=$check05'>$check05</th>
            <th align='center' width=150px><a href='pc_getdeposit.php'>收訂</th>
            <th align='center' width=150px>" . '帳號：' . "$name</th>
            <th align='center' width=150px>" . '群組：' . "$group</th>
            <th align='center' width=150px><a href='pc_account_admin.php?'>管理</th>
            <th align='center'><a href='pc_logout.php?'>$indate</th>
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
    ?>

    <div class="flex-container"></div>
    <div class="row">
        <?php
        require_once("dbtools.inc.php");
        require_once("indate.php");
        require_once("push.php");
        $link = create_connection();
        $sql = "SELECT * FROM dynamiclist where route = '$route' Group by  groupname ";
        $result = execute_sql($link, "tw1_yssales", $sql);
        $total_fields = mysqli_num_fields($result);
        $total_records = mysqli_num_rows($result);

        echo '<div class="flex-container"></div>';
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            $urltemp = urlencode($row['groupname']);
            $grouptemp = $row['groupname'];
            echo '<div class="col-sm-4 item"><a href=tourlist.php?groupname='.$urltemp.' '.'target="_blank"><h4>'.$grouptemp.'</h4></a></div>';
        }
        echo '</div>';
        ?>
    </div>

    <?php
    mysqli_free_result($result);
    mysqli_close($link);





    ?>
</body>

</html>