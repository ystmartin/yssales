<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="m_style.css">
	</head>
<body>

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

$routename = $_GET["route"];

$records_per_page = 200;
	if (isset($_GET["page"]))
        $page = $_GET["page"];
		else
        $page = 1;

	require_once("dbtools.inc.php");
	require_once("indate.php");	
	require_once("push.php");
	$link = create_connection();
	$sql = "SELECT * FROM dynamiclist where route = '$routename' Group by  groupname  ";

	$result = execute_sql($link,"tw1_yssales",$sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);


	echo "<table border='0' align='center' width='980'>";
	echo "<tr>";
	echo "<th align='center' ><a href='javascript:history.back()'>回上一頁</th>";
	echo "<th align='center' ><a href='m_index.php'>選擇線別</th>";
	echo "<th align='center' ><a href='pc_index.php'>-PC版面-</th>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='980'>";
	echo "<tr>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check01'>$check01</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check02'>$check02</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check03'>$check03</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check04'>$check04</th>";
	echo "<th align='center' ><a href='m_push.php?keyword=$check05'>$check05</th>";
	echo "<th align='center'><a href='m_getdeposit.php'>收訂</th>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='980'>";
	echo "<tr>";
	echo "<th align='center' >" . '帳號：' . "$name</th>";
	echo "<th align='center' >" . '群組：' . "$group</th>";
	echo "<th align='center' ><a href='m_logout.php?'>$indate</th>";
	echo "</tr>";
	echo "</table>";
	echo "<table border='0' align='center' width='980'>";
	echo "<tr>";
	echo "<td id='head01' align='center'>團型列表</td>";
	echo "</tr>";

	$j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <=$records_per_page)
      {
         if($j%2==0){
         $color="#f5efff";
		}
		if($j%2==1){
         $color="";
		}
		
		echo "<tr bgcolor='$color' id='head02'>";		
     //   echo "<td align='center'>$j</td>";
		//echo "<td align='center'>$row[3]</td>";
		//echo "<td align='center'>$row[4]</td>";
		//echo "<td align='left' width=80%><font size= 20px>$row[5]</font></td>";
		//echo "<td align='center'>$row[6]</td>";
		//echo "<td align='center'>$row[7]</td>";
		//echo "<td align='center'>$row[8]</td>";
        //echo "<td align='center'>$row[9]</td>";
        //echo "<td align='center'>$row[10]</td>";
		//echo "<td align='center'>$row[11]</td>";
		//echo "<td align='center'>$row[12]</td>";
        //echo "<td align='center'>$row[13]</td>";
		//$urltemp=urlencode($row[5]);
        //echo "<td align='center' width=80%>"."<a href='m_grouplist.php?groupname=";
		//echo "$urltemp"."'><font size= 20px>查詢</font></a></td>";
		/*echo "<td align='center'>"."<a href='forecase_daily.php?case_no=";
		echo "$row[0]"."'>詳情</a></td>";
*/
		$urltemp=urlencode($row['groupname']);
		$grouptemp=$row['groupname'];
        echo "<td align='left' >"."<a href='m_grouplist.php?groupname=";
		echo "$urltemp"."'><font size= 20px>".$grouptemp."</font></a></td>";
		echo "</tr>";
					
      $j++;
        		
      }
/*  
	  
      echo "</table>" ;
	
	  echo "<p align='center'>";
      if ($page > 1)
        echo "<a href='m_modelist.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='m_modelist.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='m_modelist.php?page=". ($page + 1) . "'>下一頁</a> ";	
				
			echo "</p>";
	
*/
	

	mysqli_free_result($result);
	mysqli_close($link);
    

	
	
	?>
	</body>
</html>
		
