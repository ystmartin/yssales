<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <?php

    $passed = "false";
    //	echo $passed;
    $name     = $_COOKIE["name"];
    $group     = $_COOKIE["group"];
    $passed     = $_COOKIE["passed"];
    //	$authcode 	= $_COOKIE["authcode"];
    date_default_timezone_set("Asia/Shanghai");


    // if ($passed != "TRUE") {
    //     header("location:pc_login.php");
    //     exit();
    // }

    // if ($group != "admin") {
    //     header("location:pc_index.php");
    //     exit();
    // }

    $id = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $fixdate = $_POST['fixdate'];
    $memo = $_POST['memo'];

    echo $id;
    echo $username;
    echo $password;
    echo $level;
    echo $fixdate;
    echo $memo;



    require_once("dbtools.inc.php");
    require_once("indate.php");
    $link = create_connection();
    $sql = "UPDATE ysaccount SET username='$username',password='$password',level='$level',fixdate='$fixdate',memo='$memo'  where sn=$id ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    echo $result;
    mysqli_free_result($result);
    mysqli_close($link);


    header("Location: pc_account_admin.php"); 


    ?>

    </form>
</body>

</html>