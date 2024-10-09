<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    if($route=$_GET["rc_route"]){
        setcookie("rc_route",$route,time()+3600);
        setcookie("only_route",'Y',time()+3600);
        setcookie("rc_groupname",$groupname,time()-3600);
    }
    if($groupname=$_GET["rc_groupname"]){
        setcookie("rc_groupname",$groupname,time()+3600);
        setcookie("only_route",'Y',time()-3600);
    }
    if($setsp01=$_GET["check01"]){
        //echo 'setsp01:'.$setsp01;    
        if('Y' == $setsp01){
            setcookie("setsp01","N",time()+3600);
            //echo "N:".$setsp01;
        }else{
            setcookie("setsp01","Y",time()+3600);
            setcookie("setsp02","N",time()+3600);
            setcookie("setsp03","N",time()+3600);
            setcookie("setsp04","N",time()+3600);
           // echo "Y:".$setsp01;
        }
    }
    if($setsp02=$_GET["check02"]){
        //echo 'setsp01:'.$setsp01;    
        if('Y' == $setsp02){
            setcookie("setsp02","N",time()+3600);
            //echo "N:".$setsp01;
        }else{
            setcookie("setsp01","N",time()+3600);
            setcookie("setsp02","Y",time()+3600);
            setcookie("setsp03","N",time()+3600);
            setcookie("setsp04","N",time()+3600);
           // echo "Y:".$setsp01;
        }
    }
    if($setsp03=$_GET["check03"]){
        //echo 'setsp01:'.$setsp01;    
        if('Y' == $setsp03){
            setcookie("setsp03","N",time()+3600);
            //echo "N:".$setsp01;
        }else{
            setcookie("setsp01","N",time()+3600);
            setcookie("setsp02","N",time()+3600);
            setcookie("setsp03","Y",time()+3600);
            setcookie("setsp04","N",time()+3600);
           // echo "Y:".$setsp01;
        }
    }
    if($setsp04=$_GET["check04"]){
        //echo 'setsp01:'.$setsp01;    
        if('Y' == $setsp04){
            setcookie("setsp04","N",time()+3600);
            //echo "N:".$setsp01;
        }else{
            setcookie("setsp01","N",time()+3600);
            setcookie("setsp02","N",time()+3600);
            setcookie("setsp03","N",time()+3600);
            setcookie("setsp04","Y",time()+3600);
           // echo "Y:".$setsp01;
        }
    }
    if($search=$_POST["search"]){
        setcookie("search",$search,time()+3600);
    }
    if('clear'==$_GET["search"]){
        setcookie("search","",time()-3600);
    }

    header("Location:rc_index.php");  //手機版
    ?>




    </body>
</html>
		
