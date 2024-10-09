<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="test.css" />
</head>

<body>

	<?php

	$passed = "false";
	$name 	= $_COOKIE["name"];
	$group 	= $_COOKIE["group"];
	$passed 	= $_COOKIE["passed"];


	date_default_timezone_set("Asia/Shanghai");


	if ($passed != "TRUE") {
		header("location:pc_login.php");
		exit();
	}

	if($_GET["page"]==NULL)
	{
	$keyword = $_GET["keyword"];
	setcookie("keyword",$keyword);
	}
	else{
		$keyword = $_COOKIE["keyword"];
	}

	
	$records_per_page = 30;
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	require_once("dbtools.inc.php");
	require_once("indate.php");
	require_once("push.php");
	$link = create_connection();
	//$sql = "SELECT * FROM dynamiclist where groupmemo like '%$keyword%' Group by  groupname order by depdate";
	$sql = "SELECT * FROM dynamiclist where groupmemo like '%$keyword%'  or groupid like '%$keyword%' or groupname like '%$keyword%' or productname like '%$keyword%' order by depdate ASC";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);

	echo "<div>";
	echo "<table>";
	echo "<thead>";
	echo "<th id='head01'><a href='javascript:history.back()'>回上一頁</th>";
	echo "<th id='head01'><a href='pc_index.php'>選擇線別</th>";
	echo "<th id='head01'><a href='pc_push.php?keyword=$check01'>$check01</th>";
	echo "<th id='head01'><a href='pc_push.php?keyword=$check02'>$check02</th>";
	echo "<th id='head01'><a href='pc_push.php?keyword=$check03'>$check03</th>";
	echo "<th id='head01'><a href='pc_push.php?keyword=$check04'>$check04</th>";
	echo "<th id='head01'><a href='pc_push.php?keyword=$check05'>$check05</th>";
	echo "<th id='head01'><a href='pc_getdeposit.php'>收訂</th>";
	echo "<th id='head01'>" . '帳號：' . "$name</th>";
	echo "<th id='head01'>" . '群組：' . "$group</th>";
	echo "<th align='center' id='head01'><a href='pc_account_admin.php?'>管理</th>";
	echo "<th id='head01' ><a href='pc_logout.php?'>$indate</th>";
	echo "</thead>";
	echo "<thead>";
	echo "<th id='head02'>搜尋團號、團型、產品名稱及員工備註關鍵字--"."<font color='blue'>$keyword</font>"."--查詢</th>";
	echo "</thead>";
	echo "<thead>";
	echo "<th id='head03' width=4% >出發日期</th>";
	echo "<th id='head03' width=5%>團號</th>";
	echo "<th id='head03' width=12% align='left'>團型</th>";
	echo "<th id='head03' width=18% align='left'>產品名稱(外網團名)</th>";
	echo "<th id='head03' width=4%>同業價</th>";
	echo "<th id='head03' width=4%>直客價</th>";
	echo "<th id='head03' width=3%>總機位</th>";
	echo "<th id='head03' width=3%>保留數</th>";
	echo "<th id='head03' width=3%>報名數</th>";
	echo "<th id='head03' width=3%>可售數</th>";
	echo "<th id='head03' width=3%>收訂數</th>";
	echo "<th id='head03' width=4% >訂金</th>";
	echo "<th id='head03' width=5% >班機</th>";
	echo "<th id='head03' width=5% >出入點</th>";
	echo "<th id='head03' width=18% align='left'>員工備註</th>";
	echo "</thead>";
	echo "</table>";
	echo "</div>";


	echo "<table>";
	$j = 1;
	while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page) {
		if ($j % 2 == 0) {
			$color = "#ffd2cd";
		}
		if ($j % 2 == 1) {
			$color = "#ffebe8";
		}

	
		if (strpos(strtolower($row['groupmemo']), $check01) !== false) {
			$font_color = 'red';
		} else {
			$font_color = 'black';
		};

		echo "<tr>";
		echo "<td id='head04' bgcolor='$color' width=4%><font color=$font_color>" . $row['depdate'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=5%><font color=$font_color>" . $row['groupid'] . "</font></td>";
		echo "<td id='head04' align='left' bgcolor='$color' width=12%><font color=$font_color>" . $row['groupname'] . "</font></td>";
		echo "<td id='head04' align='left' bgcolor='$color' width=18%><font color=$font_color>" . $row['productname'] . "</font></td>";
		echo "<td id='head04' align='right' bgcolor='$color' width=4%><font color=$font_color>" . $row['agentnet'] . "</font></td>";
		echo "<td id='head04' align='right' bgcolor='$color' width=4%><font color=$font_color>" . $row['customnet'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=3%><font color=$font_color>" . $row['totalset'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=3%><font color=$font_color>" . $row['reserve'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=3%><font color=$font_color>" . $row['signup'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=3%><font color=$font_color>" . $row['cansales'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=3%><font color=$font_color>" . $row['getdeposit'] . "</font></td>";
		echo "<td id='head04' align='right' bgcolor='$color' width=4%><font color=$font_color>" . $row['depositprice'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=5%><font color=$font_color>" . $row['flight'] . "</font></td>";
		echo "<td id='head04' align='center' bgcolor='$color' width=5%><font color=$font_color>" . $row['inoutpoint'] . "</font></td>";
		echo "<td id='head04' align='left' bgcolor='$color' width=18% ><font color=$font_color>" . $row['groupmemo'] . "</font></td>";
		echo "</tr>";


		$j++;
	}

	
	echo    "</table>";
	

	echo "<p align='center'>";
	if ($page > 1)
		echo "<a href='pc_push.php?page=" . ($page - 1) . "'>上一頁</a> ";

	for ($i = 1; $i <= $total_pages; $i++) {
		if ($i == $page)
			echo "$i ";
		else
			echo "<a href='pc_push.php?page=$i'>$i</a> ";
	}

	if ($page < $total_pages)
		echo "<a href='pc_push.php?page=" . ($page + 1) . "'>下一頁</a> ";

	echo "</p>";




	mysqli_free_result($result);
	mysqli_close($link);





	?>
</body>

</html>