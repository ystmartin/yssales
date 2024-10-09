<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
<body>
    
    <?php
    $name=      $_POST["name"];
    $password=  $_POST["password"];
    echo $name;
    echo $password;


    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql="SELECT * FROM ysaccount where username = '$name' AND password = '$password'";
    $result=execute_sql($link,"tw1_yssales",$sql);
    $row=mysqli_fetch_row($result);
     
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
    
        $group=$row[3];
        $name=$row[1];
        vistor();
        
        mysqli_free_result($result);
        mysqli_close($link);
    
        setcookie("name",$name);
        setcookie("group",$group);
        setcookie("passed","TRUE",time()+28800);
        header("Location: m_index.php");  //手機版
    }







    ?>




    </body>
</html>
		
