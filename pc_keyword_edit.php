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


	if ($passed != "TRUE") {
		header("location:pc_login.php");
		exit();
	}

	if ($group != "admin") {
		header("location:pc_index.php");
		exit();
	}

	$id = $_GET["id"];
	require_once("dbtools.inc.php");
	require_once("indate.php");


	echo $id;
	







	$link = create_connection();
	$sql = "SELECT * FROM keyword where id='$id' ";
	$result = execute_sql($link, "tw1_yssales", $sql);

	$row = mysqli_fetch_assoc($result);
	$check01 = $row['check01'];
	$check02 = $row['check02'];
	$check03 = $row['check03'];
	$check04 = $row['check04'];
	$check05 = $row['check05'];


	echo $keyword;
	
	
	mysqli_free_result($result);
	mysqli_close($link);

	?>
	<form name="form1" method="post" action="pc_keyword_update.php?id=<?php echo $id ?>">
		<table border="0" width="900" align="center" cellspacing="0">
			
			<tr bgcolor="#FFF000" align="center">
				<td width="6%">關鍵字1</td>
				<td width="8%"><input type="text" name="check01" value=<?php echo $check01 ?>></td>
				<td width="6%">關鍵字2</td>
				<td width="8%"><input type="text" name="check02" value=<?php echo $check02 ?>></td>
				<td width="6%">關鍵字3</td>
				<td width="8%"><input type="text" name="check03" value=<?php echo $check03 ?>></td>
				<td width="6%">關鍵字4</td>
				<td width="8%"><input type="text" name="check04" value=<?php echo $check04 ?>></td>
				<td width="6%">關鍵字5</td>
				<td width="8%"><input type="text" name="check05" value=<?php echo $check05 ?>></td>
				<td><input type="submit" style="height:30px; width:80px" size="20" value="輸入"></td>
			</tr>
		</table>
	</form>
</body>

</html>