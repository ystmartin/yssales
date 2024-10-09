<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
</head>

<body>

	<?php

	$passed = "false";
	//	echo $passed;
	$name 	= $_COOKIE["name"];
	$group 	= $_COOKIE["group"];
	$passed 	= $_COOKIE["passed"];
	//	$authcode 	= $_COOKIE["authcode"];
	date_default_timezone_set("Asia/Shanghai");


	// if ($passed != "TRUE") {
	// 	header("location:pc_login.php");
	// 	exit();
	// }

	// if ($group != "admin") {
	// 	header("location:pc_index.php");
	// 	exit();
	// }

	$id = $_GET["id"];
	require_once("dbtools.inc.php");
	require_once("indate.php");
	$link = create_connection();
	$sql = "SELECT * FROM ysaccount where sn='$id' ";
	$result = execute_sql($link, "tw1_yssales", $sql);



	$row = mysqli_fetch_assoc($result);
	$username = $row['username'];
	$password = $row['password'];
	$level = $row['level'];
	$randpassword = rand(1000, 9999);


	mysqli_free_result($result);
	mysqli_close($link);

	?>
	<form name="form1" method="post" action="pc_account_update.php?id=<?php echo $id ?>">
		<table border="0" width="900" align="center" cellspacing="0">
			<tr>
				<td colspan='8'>亂數產生的參考密碼:<?php echo $randpassword ?> </td>
			</tr>
			<tr bgcolor="#FFF000" align="center">
				<td width="6%">帳號</td>
				<td width="8%"><input type="text" name="username" value=<?php echo $username ?>></td>
				<td width="8%">密碼</td>
				<td width="8%"><input type="text" name="password" value=<?php echo $password ?>></td>
				<td width="6%">群組</td>
				<td width="6%"><select name="level" value=<?php echo $level ?>>
						<option value="admin">admin</option>
						<option value="RC">RC</option>
					</select></td>
				<td width="10%">建立時間</td>
				<td width="8%"><input type="text" name="fixdate" value=<?php echo date("Y/m/d") ?>></td>
			</tr>
			<tr bgcolor="#FFF0c0" align="right">
				<td>備註</td>
				<td width="10%"><input type="text" name="memo"></td>
				<td><input type="submit" style="height:30px; width:80px" size="20" value="輸入"></td>
			</tr>
		</table>
	</form>
</body>

</html>