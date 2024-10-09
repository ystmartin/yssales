<?php

require_once("dbtools.inc.php");
$link = create_connection();
$table="dynamiclist";
$sql = "TRUNCATE TABLE `$table`";
$result = execute_sql($link, "tw1_yssales", $sql);



mysqli_free_result($result);
mysqli_close($link);//關閉資料庫連線
header("location:newfile.php")




?>