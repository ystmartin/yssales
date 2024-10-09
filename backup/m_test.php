<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="m_test.css">
	</head>
<body>
    <!-- 實現一個固定表頭，可滾動的table -->
    <?php
    $passed ="false";

	$name 	= $_COOKIE["name"];
	$group 	= $_COOKIE["group"];
	$passed 	= $_COOKIE["passed"];

	date_default_timezone_set("Asia/Shanghai");
	

	if($passed != "TRUE")
	
	{
		header("location:pc_login.php");
	exit();
	}


$groupname = $_GET["groupname"];


$records_per_page = 200;
	if (isset($_GET["page"]))
        $page = $_GET["page"];
		else
        $page = 1;

	require_once("dbtools.inc.php");
	require_once("indate.php");	
	$link = create_connection();
	$sql = "SELECT * FROM dynamiclist where groupname = '$groupname'  ";

	$result = execute_sql($link,"tw1_yssales",$sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);

    
    echo "<div>";
    echo    "<table>";
    echo    "<thead>";
    echo    "<th id='head01'><a href='javascript:history.back()'>回上一頁</th>";
    echo    "<th id='head01'><a href='m_index.php'>選擇線別</th>";
    echo    "<th id='head01'><a href='pc_index.php'>-PC版面-</th>";
    echo    "</thead>";
    echo    "<thead>";
    echo  "<th id='head01'><a href='m_push.php?keyword=$check01'>$check01</th>";
    echo  "<th id='head01'><a href='m_push.php?keyword=$check02'>$check02</th>";
    echo  "<th id='head01'><a href='m_push.php?keyword=$check03'>$check03</th>";
    echo  "<th id='head01'><a href='m_push.php?keyword=$check04'>$check04</th>";
    echo  "<th id='head01'><a href='m_push.php?keyword=$check05'>$check05</th>";
    echo    "</thead>";
    echo    "<thead>";
    echo  "<th id='head01'>" . '帳號：' . "$name</th>";
    echo  "<th id='head01'>" . '群組：' . "$group</th>";
    echo  "<th id='head01'><a href='m_logout.php?'>$indate</th>";
    echo    "</thead>";
    echo    "<thead>";
    echo  "<th id='head02'>團型列表</th>";
    echo    "</thead>";
    echo    "<thead>";
    echo    "<th id='head03' width=20% >出發日期</th>";
    echo    "<th id='head03' colspan='4'>團號</th>";
    echo    "<th id='head03' width=20% >訂金</th>";
    echo    "</thead>";
    echo    "<thead>";

    echo    "<th id='head03' >團名</th>";

    echo    "</thead>";
    echo    "<thead>";
    echo  "<th id='head03' width=20%>同業價</th>";
    echo  "<th id='head03' width=20%>直客價</th>";
    echo  "<th id='head03' width=15%>總機位</th>";
    echo  "<th id='head03' width=15%>保留數</th>";
    echo  "<th id='head03' width=15%>可售數</th>";
    echo  "<th id='head03' width=15%>收訂數</th>";
    echo    "</thead>";
    echo    "<thead>";
    echo  "<th id='head03' colspan='6'>員工備註</th>";
    echo    "</thead>";

    echo    "<tbody>";
	$j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <=$records_per_page)
      {
         if($j%2==0){
         $color="#ffea99";
		}
		if($j%2==1){
         $color="#b0e6e9";
		}
		
		echo "<tr bgcolor='$color' >";

		//if (strpos("push", strtolower($row[15])) !== false) {
		if (strpos(strtolower($row['groupmemo']),$check01) !== false) {
			$font_color='red';
		} else
		{
			$font_color='black';
		}; 

		echo "<td align='center' bgcolor='$color' width=20%><font color=$font_color>".$row['depdate']."</font></td>";
		echo "<td align='center' bgcolor='$color' colspan='4'><font color=$font_color>".$row['groupid']."</font></td>";
		echo "<td align='center' bgcolor='$color' width=20%><font color=$font_color>".$row['depositprice']."</font></td>";
        echo "</tr>";
		//echo "<td align='right'><font color=$font_color>$row[4]</font></td>";
        echo "<tr>";
		echo "<td align='left' bgcolor='$color' colspan='6'><font color=$font_color>".$row['groupname']."</font></td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='right'  bgcolor='$color' width=20%><font color=$font_color>".$row['agentnet']."</font></td>";
		echo "<td align='right'  bgcolor='$color' width=20%><font color=$font_color>".$row['customnet']."</font></td>";
		echo "<td align='center'  bgcolor='$color' width=15%><font color=$font_color>".$row['totalset']."</font></td>";
		echo "<td align='center'  bgcolor='$color' width=15%><font color=$font_color>".$row['reserve']."</font></td>";
		echo "<td align='center'  bgcolor='$color' width=15%><font color=$font_color>".$row['cansales']."</font></td>";
		echo "<td align='center' bgcolor='$color'  width=15%><font color=$font_color>".$row['getdeposit']."</font></td>";
		echo "</tr>";
        echo "<tr>";
		echo "<td align='left' bgcolor='$color' colspan='6'><font color=$font_color>".$row['groupmemo']."</font></td>";
		echo "</tr>";
					
      $j++;
        		
      } 
    echo    "</tbody>";
    echo    "</table>";
    echo    "</div>";

    echo "<p align='center'>";
      if ($page > 1)
        echo "<a href='m_grouplist.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='m_grouplist.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='m_grouplist.php?page=". ($page + 1) . "'>下一頁</a> ";	
				
			echo "</p>";

 	mysqli_free_result($result);
	mysqli_close($link);



	
	
	?>
	</body>
</html>
		
