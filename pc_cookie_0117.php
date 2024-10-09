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
    
    if($key01=$_GET["check01"]){
        //echo 'key01:'.$key01;    
        if('Y' == $key01){
            setcookie("key01","N",time()+3600);
            //echo "N:".$key01;
        }else{
            setcookie("key01","Y",time()+3600);
            setcookie("key02","N",time()+3600);
            setcookie("key03","N",time()+3600);
            setcookie("key04","N",time()+3600);
           // echo "Y:".$key01;
        }
    }
    if($key02=$_GET["check02"]){
        //echo 'key01:'.$key01;    
        if('Y' == $key02){
            setcookie("key02","N",time()+3600);
            //echo "N:".$key01;
        }else{
            setcookie("key01","N",time()+3600);
            setcookie("key02","Y",time()+3600);
            setcookie("key03","N",time()+3600);
            setcookie("key04","N",time()+3600);
           // echo "Y:".$key01;
        }
    }
    if($key03=$_GET["check03"]){
        //echo 'key01:'.$key01;    
        if('Y' == $key03){
            setcookie("key03","N",time()+3600);
            //echo "N:".$key01;
        }else{
            setcookie("key01","N",time()+3600);
            setcookie("key02","N",time()+3600);
            setcookie("key03","Y",time()+3600);
            setcookie("key04","N",time()+3600);
           // echo "Y:".$key01;
        }
    }
    if($key04=$_GET["check04"]){
        //echo 'key01:'.$key01;    
        if('Y' == $key04){
            setcookie("key04","N",time()+3600);
            //echo "N:".$key01;
        }else{
            setcookie("key01","N",time()+3600);
            setcookie("key02","N",time()+3600);
            setcookie("key03","N",time()+3600);
            setcookie("key04","Y",time()+3600);
           // echo "Y:".$key01;
        }
    }
    
   
   
    header("Location:pc_index.php");  //手機版
    ?>




    </body>
</html>
		
