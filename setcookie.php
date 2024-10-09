<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    // if($route=$_GET["route"]){
    //     setcookie("route",$route,time()+3600);
    //     header("Location:pc_index.php");
    // }
    // if($groupname=$_GET["groupname"]){
    //     setcookie("groupname",$groupname,time()+3600);
    //     header("Location:pc_index.php");
    // }
    if($accsn=$_GET["accsn"]){
    require_once("dbtools.inc.php");
	require_once("indate.php");
	require_once("push.php");
	$link = create_connection();
	$sql = "select * from user where accsn=$accsn" ;
	$result = execute_sql($link, "tw1_yssales", $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['admin']=="Y"){
            $sql="UPDATE user SET admin='N' where accsn=$accsn ";
            $result = execute_sql($link, "tw1_yssales", $sql);
            //echo '1'.$accsn;    
        }else{
            $sql="UPDATE user SET admin='Y' where accsn=$accsn ";
            $result = execute_sql($link, "tw1_yssales", $sql);
            //echo '2'.$accsn;
        }
        
        header("Location:pc_account_admin.php");
    }
    mysqli_free_result($result);
    mysqli_close($link);

    ?>




    </body>
</html>
		
