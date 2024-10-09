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

	
    echo "<table border='0' align='center' width='800'>";
    echo "<tr>";
    echo "<td align='center' bgcolor='goldenrod' colspan='4' ><a href='javascript:history.back()'>回上一頁</td>";
    echo "<td align='center' bgcolor='goldenrod' colspan='4' ><a href='pc_index.php'>選擇線別</td>";
    echo "<td align='center' bgcolor='goldenrod' colspan='4' ><a href='pc_push.php'>-push-</td>";
    echo "</tr>";
    echo "</table>" ;

    
    echo "<table border='0' align='center' width='800'>";
	echo "<tr>";
    echo "<td align='center' bgcolor=#F75000 colspan='3'>動態表行程細節</td>";
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
        echo "<td align='center' bgcolor=#FF0080 width=4% >出發日期</td>";
        echo "<td align='center' bgcolor=#FF0080 width=4% >團號</td>";
        echo "<td align='center' bgcolor=#FF0080 >團名</td>";

        echo "</tr>";
        echo "<tr>";
		echo "<td align='center'><font color=$font_color>$row[3]</font></td>";
		echo "<td align='center'><font color=$font_color>$row[4]</font></td>";
		echo "<td align='left'><font color=$font_color>$row[5]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=5% >同業價</td>";
        echo "<td align='center' bgcolor=#FF0080 width=5% >直客價</td>";
        echo "<td align='center' bgcolor=#FF0080 width=6% >班機</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='right'><font color=$font_color>$row[6]</font></td>";
		echo "<td align='right'><font color=$font_color>$row[7]</font></td>";
		echo "<td align='center'><font color=$font_color>$row[8]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=6% >出入點</td>";	
        echo "<td align='center' bgcolor=#FF0080 width=4% >總機位</td>";
        echo "<td align='center' bgcolor=#FF0080 width=3%>保留</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center'><font color=$font_color>$row[9]</font></td>";
        echo "<td align='center'><font color=$font_color>$row[10]</font></td>";
		echo "<td align='center'><font color=$font_color>$row[11]</font></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 width=3%>可售</td>";
        echo "<td align='center' bgcolor=#FF0080 width=3%>收訂</td>";
        echo "<td align='center' bgcolor=#FF0080 width=4%>訂金</td>";
        echo "</tr>";
        echo "<tr>";
		echo "<td align='center'><font color=$font_color>$row[12]</font></td>";
        echo "<td align='center'><font color=$font_color>$row[13]</font></td>";
		echo "<td align='right'><font color=$font_color>$row[14]</font></td>";
		echo "</tr>";
        echo "<tr>";
        echo "<td align='center' bgcolor=#FF0080 colspan='3'>員工備註</td>";
        
        echo "</tr>";
        echo "<tr>";
		echo "<td align='left' colspan='3'><font color=$font_color>$row[15]</font></td>";
		echo "</tr>";
					
      $j++;
        		
      }
  
	  
      echo "</table>" ;
	
	  echo "<p align='center'>";
      if ($page > 1)
        echo "<a href='pc_detial.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='pc_detial.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='pc_detial.php?page=". ($page + 1) . "'>下一頁</a> ";	
				
			echo "</p>";
	

	

	mysqli_free_result($result);
	mysqli_close($link);



	
	
	?>
	</body>
</html>
		
