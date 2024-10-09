<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    if($route=$_GET["route"]){
        setcookie("route",$route,time()+3600);
        setcookie("only_route",'Y',time()+3600);
        setcookie("groupname",$groupname,time()-3600);
    }
    if($groupname=$_GET["groupname"]){
        setcookie("groupname",$groupname,time()+3600);
        setcookie("only_route",'Y',time()-3600);
    }
    header("Location:pc_index_modal.php");  //手機版
    ?>




    </body>
</html>
		
