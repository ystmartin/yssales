<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="m_style.css">
</head>
<style>
	body {
		font-size: 100%;
	}

	h1 {
		font-size: 4em;
	}

	h2 {
		font-size: 1.875em;
	}

	p {
		font-size: 0.875em;
	}
</style>

<body>

	<?php

	$passed = "false";
	//	echo $passed;
	$name 	= $_COOKIE["name"];
	$group 	= $_COOKIE["group"];
	$passed 	= $_COOKIE["passed"];
	//	$authcode 	= $_COOKIE["authcode"];
	date_default_timezone_set("Asia/Shanghai");


	if ($passed != "TRUE") {
		header("location:pc_login.php");
		exit();
	}

	$records_per_page = 200;
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	require_once("dbtools.inc.php");
	require_once("indate.php");
	require_once("push.php");
	$link = create_connection();
	$sql = "SELECT * FROM dynamiclist Group by  route ";

	$result = execute_sql($link, "tw1_yssales", $sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);




	echo "<table border='0' align='center' width='100%'>";
	echo "<tr>";
	echo "<th align='center' ><a href='javascript:history.back()'>回上一頁</th>";
	echo "<th align='center' ><a href='m_index.php'>選擇線別</th>";
	echo "<th align='center' ><a href='pc_index.php'>-PC版面-</th>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='100%'>";
	echo "<tr>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check01'>$check01</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check02'>$check02</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check03'>$check03</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check04'>$check04</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check05'>$check05</th>";
	echo "<th align='center'><a href='m_getdeposit.php'>收訂</th>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='100%'>";
	echo "<tr>";
	echo "<th align='center' >" . '帳號：' . "$name</th>";
	echo "<th align='center' >" . '群組：' . "$group</th>";
	echo "<th align='center' ><a href='m_logout.php?'>$indate</th>";
	echo "</tr>";
	echo "</table>";

	echo "<table  border='0' align='center' >";
	echo "<tr>";
	echo "<td align='right'>搜尋團號、團型、產品名稱及員工備註關鍵字</td>";
	echo "<td><form action='m_search.php' method='get'>";
	echo "<input  type='text' name='keyword' />";
	echo "<input type='submit' value='search'/>";
	echo "</form>";
	echo "</tr>";
	echo "</table >";

	echo "<table border='0' align='center' width='100%'>";
	echo "<tr>";
	echo "<td id='head01' align='center'>線別列表</td>";
	echo "</tr>";

	$j = 1;
	while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page) {
		if ($j % 2 == 0) {
			$color = "#f5efff";
		}
		if ($j % 2 == 1) {
			$color = "";
		}

		echo "<tr bgcolor='$color' id='head02' >";
		$route_tmp = $row['route'];
		echo "<td align='left'>" . "<a href='m_modelist.php?route=";
		echo "$route_tmp" . "'><font size= 20px>" . $route_tmp . "</font></a></td>";
		echo "</tr>";

		$j++;
	}


	echo "</table>";
	/*

	echo "<p align='center'>";
	if ($page > 1)
		echo "<a href='m_index.php?page=" . ($page - 1) . "'>上一頁</a> ";

	for ($i = 1; $i <= $total_pages; $i++) {
		if ($i == $page)
			echo "$i ";
		else
			echo "<a href='m_index.php?page=$i'>$i</a> ";
	}

	if ($page < $total_pages)
		echo "<a href='m_index.php?page=" . ($page + 1) . "'>下一頁</a> ";

	echo "</p>";


*/

	mysqli_free_result($result);
	mysqli_close($link);





	?>
</body>

</html>