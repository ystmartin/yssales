<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    if($route=$_GET["sp_route"]){
        setcookie("route",$route,time()+3600);
    }
    if($groupname=$_GET["sp_groupname"]){
        setcookie("groupname",$groupname,time()+3600);
    }
    if($groupname=$_GET["sp_groupname"]){
        setcookie("groupname",$groupname,time()+3600);
    }
    if($_POST['sp_month']!=""){
        setcookie("sp_month",$_POST['sp_month'],time()+3600);
    }
    if($_GET['sp_month']=="clear"){
        setcookie("sp_month",'',time()+3600);
    }
    echo $_GET['sp_month'];
    echo $_COOKIE['sp_month'];
    header("Location:sprint.php");  //手機版

?>

    </body>
</html>
		
