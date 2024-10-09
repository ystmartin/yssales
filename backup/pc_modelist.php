<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
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

	//$routename = $_GET["route"];

	if($_GET["page"]==NULL)
	{
	$routename = $_GET["route"];
	
	setcookie("route",$routename);
	}
	else{
		$routename = $_COOKIE["route"];
	}



	$records_per_page = 40;
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	require_once("dbtools.inc.php");
	require_once("indate.php");
	require_once("push.php");

	$link = create_connection();
	$sql = "SELECT * FROM dynamiclist where route = '$routename' Group by  groupname  order by groupname ASC ";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);
	
	echo "<table  border='0' align='center' >";
	echo "<tr>";
	echo "<th align='center'><a href='javascript:history.back()'>回上一頁</th>";
	echo "<th align='center'><a href='pc_index.php'>選擇線別</th>";
	echo "<th align='center'><a href='pc_push.php?keyword=$check01'>$check01</th>";
	echo "<th align='center'><a href='pc_push.php?keyword=$check02'>$check02</th>";
	echo "<th align='center'><a href='pc_push.php?keyword=$check03'>$check03</th>";
	echo "<th align='center'><a href='pc_push.php?keyword=$check04'>$check04</th>";
	echo "<th align='center'><a href='pc_push.php?keyword=$check05'>$check05</th>";
	echo "<th align='center'><a href='pc_getdeposit.php'>收訂</th>";
	echo "<th align='center'>" . '帳號：' . "$name</th>";
	echo "<th align='center'>" . '群組：' . "$group</th>";
	echo "<th align='center'><a href='pc_account_admin.php?'>管理</th>";
	echo "<th align='center'><a href='pc_logout.php?'>$indate</th>";
	echo "</tr>";
	echo "</table >";
	echo "<table  border='0' align='center' >";
	echo "<tr>";
	echo "<td id='head01' align='center'  colspan='6' >團型列表</td>";
	echo "<td id='head01' align='center'  colspan='5' ><a href='pc_groupnamelist.php?route=$routename' target='_blank'>同線別子團列表</td>";
	echo "</tr>";
	$j = 1;
	while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page) {
		if ($j % 2 == 0) {
			$color = "#f5efff";
		}
		if ($j % 2 == 1) {
			$color = "";
		}

		echo "<tr>";
		echo "<td align='center'  width='30%' ></td>";
		$urltemp = urlencode($row['groupname']);
		$grouptemp = $row['groupname'];
		echo "<td bgcolor='$color' align='left' >" . "<a href='pc_grouplist.php?groupname=";
		echo "$urltemp" . "'>" . $grouptemp . "</a></td>";
		echo "<td align='center'  width='30%' ></td>";
		echo "</tr>";

		$j++;
	}


	echo "</table>";
	

	echo "<p align='center'>";
	if ($page > 1)
		echo "<a href='pc_modelist.php?page=" . ($page - 1) . "'>上一頁</a> ";

	for ($i = 1; $i <= $total_pages; $i++) {
		if ($i == $page)
			echo "$i ";
		else
			echo "<a href='pc_modelist.php?page=$i'>$i</a> ";
	}

	if ($page < $total_pages)
		echo "<a href='pc_modelist.php?page=" . ($page + 1) . "'>下一頁</a> ";

	echo "</p>";




	mysqli_free_result($result);
	mysqli_close($link);




	?>
</body>

</html>