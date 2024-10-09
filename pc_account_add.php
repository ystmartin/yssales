
<?php 


$username   = $_POST["username"];
$password   = $_POST["password"];
$level      = $_POST["level"];
$crdate     = $_POST["crdate"];
$memo       = $_POST["memo"];

echo $username;
echo $password;
echo $level;
echo $crdate;
echo $memo;



require_once("dbtools.inc.php");
$link = create_connection();
$sql = "INSERT INTO ysaccount (username,password,level,crdate,memo) VALUES('$username','$password','$level','$crdate','$memo')";
$result=execute_sql($link,"tw1_yssales",$sql);	

if(! $result )
{
  die('無法插入資料: ' . mysqli_error($link));
}
echo "資料插入成功\n";


header("Location: pc_account_admin.php"); 



?>	
	
