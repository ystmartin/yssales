<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    if($groupid=$_GET["fcgroupid"]){
        setcookie("fcgroupid",$groupid,time()+3600);
    }
    if($fctype=$_GET["fctype"]){
        setcookie("fctype",$fctype,time()+3600);
    }
    if($fcairline=$_GET["fcairline"]){
        setcookie("fcairline",$fcairline,time()+3600);
    }

    header("Location:rc_set_fc.php");  

?>

    </body>
</html>
		
