<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>

<?php
	
/*	
	$user_name 	= $_COOKIE["username"];
	$userid 	= $_COOKIE["userid"];
	$passed 	= $_COOKIE["passed"];
	$authcode 	= $_COOKIE["authcode"];
	date_default_timezone_set("Asia/Shanghai");
	

	if($passed != "TRUE")
	
	{
		header("location:index.php");
	exit();
	}
*/	
//	echo $user_name;
//	echo $passed;
//	echo $userid;
//	echo "<td> main </td>";

$groupid = $_GET["groupid"];
//echo $groupname;



$records_per_page = 200;
	if (isset($_GET["page"]))
        $page = $_GET["page"];
		else
        $page = 1;

	require_once("dbtools.inc.php");
	$link = create_connection();
	$sql = "SELECT * FROM dynamiclist where groupid = '$groupid'  ";
//	$sql = "SELECT * FROM forecase ";
	$result = execute_sql($link,"tw1_yssales",$sql);
	$total_fields = mysqli_num_fields($result);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $records_per_page);
	$started_record = $records_per_page * ($page - 1);
	mysqli_data_seek($result, $started_record);


	?>

<?php

	
    echo "<table border='0' align='center' width='9800'>";
    echo "<tr>";
    echo "<td align='center' bgcolor='goldenrod' ><a href='javascript:history.back()'><font size= 20px>回上一頁</font></td>";
    echo "<td align='center' bgcolor='goldenrod' ><a href='m_index.php'><font size= 20px>選擇線別</font></td>";
    echo "<td align='center' bgcolor='goldenrod' ><a href='m_push.php'><font size= 20px>-push-</font></td>";
    echo "</tr>";
    echo "</table>" ;
    echo "<table border='0' align='center' width='980'>";
    echo "<tr>";
    echo "<td align='center' bgcolor=#F75000 colspan='3'><font size= 20px>手機版動態表</font></td>";
    echo "</tr>";

	$j = 1;
      while ($row = mysqli_fetch_row($result) and $j <=$records_per_page)
      {
         if($j%2==0){
         $color="lavender";
		}
		if($j%2==1){
         $color="";
		}
		
		echo "<tr>";

				
	

     //   echo "<td align='center'>$j</td>";
        echo "<table border='0' align='center' width='980'>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080  colspan='3'><font size= 20px>出發日期</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='center' colspan='3'><font color=$font_color><font size= 20px>$row[3]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080  colspan='3' ><font size= 20px>團號</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='center' colspan='3'><font color=$font_color><font size= 20px>$row[4]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080  colspan='3'><font size= 20px>團名</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='left' colspan='3'><font color=$font_color><font size= 20px>$row[5]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=5% ><font size= 20px>同業價</td>";
        echo "<td align='center' bgcolor=#FF0080 width=5% ><font size= 20px>直客價</td>";
        echo "<td align='center' bgcolor=#FF0080 width=6% ><font size= 20px>班機</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='right'><font color=$font_color><font size= 20px>$row[6]</font></td>";
		echo "<td align='right'><font color=$font_color><font size= 20px>$row[7]</font></td>";
		echo "<td align='center'><font color=$font_color><font size= 20px>$row[8]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=6% ><font size= 20px>出入點</td>";	
        echo "<td align='center' bgcolor=#FF0080 width=4% ><font size= 20px>總機位</td>";
        echo "<td align='center' bgcolor=#FF0080 width=3%><font size= 20px>保留</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center'><font color=$font_color><font size= 20px>$row[9]</font></td>";
        echo "<td align='center'><font color=$font_color><font size= 20px>$row[10]</font></td>";
		echo "<td align='right'><font color=$font_color><font size= 20px>$row[11]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=3%><font size= 20px>可售</td>";
        echo "<td align='center' bgcolor=#FF0080 width=3%><font size= 20px>收訂</td>";
        echo "<td align='center' bgcolor=#FF0080 width=4%><font size= 20px>訂金</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='right'><font color=$font_color><font size= 20px>$row[12]</font></td>";
        echo "<td align='right'><font color=$font_color><font size= 20px>$row[13]</font></td>";
		echo "<td align='right'><font color=$font_color><font size= 20px>$row[14]</font></td>";
		echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 colspan='3'><font size= 20px>員工備註</td>";
        
        echo "</tr>";
        echo "<tr>";
		echo "<td align='left' colspan='3'><font color=$font_color><font size= 20px>$row[15]</font></td>";
		echo "</tr>";
					
      $j++;
        		
      }
  
	  
      echo "</table>" ;
	
	  echo "<p align='center'>";
      if ($page > 1)
        echo "<a href='m_detial.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='m_detial.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='m_detial.php?page=". ($page + 1) . "'>下一頁</a> ";	
				
			echo "</p>";
	

	

	mysqli_free_result($result);
	mysqli_close($link);



	
	
	?>
	</body>
</html>
		
