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


    if ($passed != "TRUE") {
        header("location:pc_login.php");
        exit();
    }

    if ($group != "admin") {
        header("location:pc_index.php");
        exit();
    }

    $id = $_GET['id'];
    $check01 = $_POST['check01'];
    $check02 = $_POST['check02'];
    $check03 = $_POST['check03'];
    $check04 = $_POST['check04'];
    $check05 = $_POST['check05'];


    echo $id;
    



    require_once("dbtools.inc.php");
    require_once("indate.php");
    $link = create_connection();
    $sql = "UPDATE keyword SET check01='$check01',check02='$check02',check03='$check03',check04='$check04',check05='$check05'  where id=$id ";
    $result = execute_sql($link, "tw1_yssales", $sql);
    echo $result;
    mysqli_free_result($result);
    mysqli_close($link);


    header("Location: pc_account_admin.php"); 


    ?>

    </form>
</body>

</html>