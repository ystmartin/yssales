<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
</head>

<body>

<?php

	if($_COOKIE["passed"]!="TURE" ||$_COOKIE["level"]!="admin"){
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


	//	$authcode 	= $_COOKIE["authcode"];



	// if ($passed != "TRUE") {
	// 	header("location:pc_login.php");
	// 	exit();
	// }

	// if ($group != "admin") {
	// 	header("location:pc_index.php");
	// 	exit();
	// }

	$headcolor01 = '#ff9800';
	$headcolor02 = '#01c9e3';
	echo "<table border='0' width='900' align='center' cellspacing='0'>";
	echo "	<h3 align='center'>連結操作</h3>";
	echo "</table>";
	echo 	"<table align='center'>";
      echo	"<tr>";
      echo	"<td>現在時間：".date('Y/m/d-A:H:i:s')."</td>";
      echo	"<td>登入帳號：".$name."</td>";
      echo	"<td>登入職務：".$level."</td>";
      echo	"</tr>";
      echo 	"</table>";
	echo "<table border='0' align='center' width='900'>";
	echo "<tr>";
	echo "<td align='center' bgcolor=$headcolor01 width=15%><a href='pc_index.php'>回動態表</td>";
	echo "<td align='center' bgcolor=$headcolor01 width=15% ><a href='fileupload.php'  target='_blank'>上傳檔案</td>";
	echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
	echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
	echo "<td align='center' bgcolor=$headcolor01 width=15% ></td>";
	echo "<td align='center' bgcolor=$headcolor01 width=15% ><a href='pc_logreader.php' target='_blank'>log查詢</a></td>";
	echo "<td align='center' bgcolor=$headcolor01 ></td>";

	echo "</tr>";
	echo "</table>";

	require_once("dbtools.inc.php");
	require_once("indate.php");
	// require_once("push.php");
	$link = create_connection();

	echo "<table border='0' width='900' align='center' cellspacing='0'>";
	echo "	<h3 align='center'>使用人次</h3>";
	echo "</table>";

// 	//查詢總人次
// 	//	$LastMonth=date("Y-m",strtotime("last month"));
	$sql = "SELECT count(*) as count FROM vistor ";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$total = $row['count'];

// 	//查詢今年
// 	//	$LastMonth=date("Y-m",strtotime("last month"));
	$sql = "SELECT count(*) as count FROM vistor WHERE YEAR(date)=YEAR(NOW())";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$thisy = $row['count'];

// 	//查詢本月
// 	//	$ThisMonth=date("Y-m",strtotime("this month"));
// 	//	echo $ThisMonth;
	$sql = "SELECT count(*) as count FROM vistor WHERE DATE_FORMAT(date, '%Y%m') = DATE_FORMAT(CURDATE() , '%Y%m')";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$thism = $row['count'];
// 	//	echo $thism ;


// 	//查詢本週
// 	//	$ThisWeek=date("Y-m",strtotime("this week"));
// 	echo $ThisWeek;
	$sql = "SELECT count(*) as count FROM vistor WHERE YEARWEEK(DATE_FORMAT(date,'%Y-%m-%d')) = YEARWEEK(NOW())";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$thisw = $row['count'];
// //	echo $thisw;


// 	//查詢昨天
// 	//	$ThisWeek=date("Y-m",strtotime("this week"));
	$sql = "SELECT count(*) as count FROM vistor WHERE TO_DAYS( NOW() ) - TO_DAYS( date) = 0";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$yestoday = $row['count'];

// 	//查詢今天
// 	//	$ThisWeek=date("Y-m",strtotime("this week"));

	$sql = "SELECT count(*) as count FROM vistor WHERE TO_DAYS( NOW() ) - TO_DAYS( date) = -1";
	$result = execute_sql($link, "tw1_yssales", $sql);
	$row = mysqli_fetch_assoc($result);
	$thisday = $row['count'];

	echo "<table border='0' align='center' width='900'>";
	echo "<tr>";
	echo "<td align='center'  width=15% >總人次</td>";
	echo "<td align='center'  width=15% >今年</td>";
	echo "<td align='center'  width=15% >本月</td>";
	echo "<td align='center'  width=15% >本周</td>";
	echo "<td align='center'  width=15% >昨日</td>";
	echo "<td align='center'  >今天</td>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='900'>";
	echo "<tr>";
	echo "<td align='center'  width=15% >$total</td>";
	echo "<td align='center'  width=15% >$thisy</td>";
	echo "<td align='center'  width=15% >$thism</td>";
	echo "<td align='center'  width=15% >$thisw</td>";
	echo "<td align='center'  width=15% >$yestoday</td>";
	echo "<td align='center'  >$thisday</td>";
	echo "</tr>";
	echo "</table>";
?>


	<table border="0" width="900" align="center" cellspacing="0">
		<h3 align="center">新增帳號</h3>
	</table>

	<form name="form1" method="post" action="pc_account_add.php">
		<table border="0" width="900" align="center" cellspacing="0">

			<tr bgcolor="#FFF000" align="center">
				<td width="6%">帳號</td>
				<td width="8%"><input type="text" name="username"></td>
				<td width="8%">密碼</td>
				<td width="8%"><input type="text" name="password"></td>
				<td width="6%">群組</td>
				<td width="6%"><select name="level">
						<option value="admin">admin</option>
						<option value="RC">RC</option>
					</select></td>
				<td width="10%">建立時間</td>
				<td width="8%"><input type="text" name="crdate" value=<?php echo date("Y/m/d") ?>></td>
			</tr>
			<tr bgcolor="#FFF0c0" align="right">
				<td>備註</td>
				<td width="10%"><input type="text" name="memo"></td>
				<td><input type="submit" style="height:30px; width:80px" size="20" value="輸入"></td>
			</tr>
		</table>
	</form>

	<?php

	
	$link = create_connection();
	$sql = "SELECT * FROM ysaccount order by sn ASC";
	$result = execute_sql($link, "tw1_yssales", $sql);
	
	$headcolor01 = '#ff9800';
	$headcolor02 = '#01c9e3';



	echo "<table border='0' width='900' align='center' cellspacing='0'>";
	echo "	<h3 align='center'>帳號清單</h3>";
	echo "</table>";
	echo "<table border='0' align='center' width='900'>";
	echo "<tr>";
	echo "<td align='center' bgcolor=$headcolor02 width=6% >序號</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >帳號</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >密碼</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >職務</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >中文名</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >建檔日期</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >更新日期</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >最後登入</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=10% >備註</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >編輯</td>";
	//echo "<td align='center' bgcolor=$headcolor02 width=4% >刪除</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=8% >修改</td>";
	echo "</tr>";

	$j = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		if ($j % 2 == 0) {
			$color = "Pink";
		}
		if ($j % 2 == 1) {
			$color = "";
		}

		echo "<tr bgcolor='$color'>";
		//   echo "<td align='center'>$j</td>";
		echo "<td align='center'>$row[sn]</td>";
		echo "<td align='right'>$row[username]</td>";
		echo "<td align='right' >********</td>";
		echo "<td align='right' >$row[level]</td>";
		echo "<td align='right'>$row[chtname]</td>";
		echo "<td align='right'>$row[crdate]</td>";
		echo "<td align='right'>$row[fixdate]</td>";
		echo "<td align='right'>$row[lastlogin]</td>";
		echo "<td align='right'>$row[memo]</td>";
 		echo "<td align='center'>"."<a href='pc_account_edit.php?id=";
		echo "$row[sn]"."'>編輯</a></td>";
		echo "<td align='center'>" . "<a href='pc_account_del.php?id=";
		echo "$row[sn]" . "'>刪除</a></td>";
		echo "</tr>";

		$j++;
	}


	echo "</table>";

//往下是關鍵字
	$link = create_connection();
	$sql = "SELECT * FROM keyword order by id ASC";
	$result = execute_sql($link, "tw1_yssales", $sql);

	$headcolor01 = '#ff9800';
	$headcolor02 = '#01c9e3';



	echo "<table border='0' width='900' align='center' cellspacing='0'>";
	echo "	<h3 align='center'>關鍵字清單</h3>";
	echo "</table>";
	echo "<table border='0' align='center' width='400'>";
	echo "<tr>";
	echo "<td align='center' bgcolor=$headcolor02 width=15% >關鍵字1</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=15% >關鍵字2</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=15% >關鍵字3</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=15% >關鍵字4</td>";
	echo "<td align='center' bgcolor=$headcolor02 width=15% >關鍵字5</td>";
	//echo "<td align='center' bgcolor=$headcolor02 width=4% >刪除</td>";
	echo "<td align='center' bgcolor=$headcolor02 >修改</td>";
	echo "</tr>";

	$j = 0;
	while ($row = mysqli_fetch_row($result)) {
		if ($j % 2 == 0) {
			$color = "Pink";
		}
		if ($j % 2 == 1) {
			$color = "";
		}

		echo "<tr bgcolor='$color'>";
		//   echo "<td align='center'>$j</td>";
		echo "<td >$row[1]</td>";
		echo "<td >$row[2]</td>";
		echo "<td >$row[3]</td>";
		echo "<td >$row[4]</td>";
		echo "<td>$row[5]</td>";
		echo "<td align='center'>" . "<a href='pc_keyword_edit.php?id=";
		echo "$row[0]" . "'>編輯</a></td>";
		echo "</tr>";

		$j++;
	}


	echo "</table>";


	mysqli_free_result($result);
	mysqli_close($link);

	?>

</body>

</html>