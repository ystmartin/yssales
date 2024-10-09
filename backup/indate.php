<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>

<?php
	


	require_once("dbtools.inc.php");
	static $indate;
    
    $link = create_connection();
	$sql = "SELECT * FROM dynamiclist ";
	$result = execute_sql($link,"tw1_yssales",$sql);
	mysqli_data_seek($result, $started_record);

 
	$j = 1;
      while ($row = mysqli_fetch_assoc($result) )
      {
         		
	

    $indate=$row['indate'];
					
      $j++;
        		
      }
  
	  
      

	mysqli_free_result($result);
	mysqli_close($link);



	
	
	?>
	</body>
</html>
		
