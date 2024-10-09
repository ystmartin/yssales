<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    $name=      $_POST["name"];
    $password=  $_POST["password"];
    require_once("dbtools.inc.php");
    date_default_timezone_set("Asia/Shanghai");
    $link = create_connection();
    $sql="SELECT * FROM ysaccount where username = '$name' AND password = '$password'";
    $result=execute_sql($link,"tw1_yssales",$sql);
    $row=mysqli_fetch_assoc($result);
     
    if(mysqli_num_rows($result) ==0)
    {
        mysqli_free_result($result);
        mysqli_close($link);
        echo "<script type ='text/javascript'>";
        echo "alert('歐歐~~帳號或密碼錯誤!!');";
        echo "history.back();";
        echo "</script>";
    }
    else
    {
    //    $name=mysqli_fetch_object($result)->name;
        $level=$row['level'];
        $name=$row['username'];
        if(  $name<>"ysrobot" and $name <> "martin"){
        vistor();
        }
        
        mysqli_free_result($result);
        mysqli_close($link);
    
        setcookie("name",$name,time()+28800);
        setcookie("level",$level,time()+28800);
        setcookie("passed","TURE",time()+28800);
        header("Location: pc_index.php");  //電腦版
    }







    ?>




    </body>
</html>
		
