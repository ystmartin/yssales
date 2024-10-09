<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
	</head>
<body>

<title>File_Upload</title>
     <meta http-equiv="content-type" charset="UTF-8"/>


     <h1>檔案上傳</h1>
         <?php
                
                # 檢查檔案是否上傳成功
                if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){
                  echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
                  echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
                  echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
                  echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';
                
                  # 檢查檔案是否已經存在
                  if (file_exists('xlsx/' . $_FILES['my_file']['name'])){
                    echo '檔案已存在。<br/>';
                  } else {
                    $file = $_FILES['my_file']['tmp_name'];
                    $dest = 'xlsx/' . $_FILES['my_file']['name'];
                
                    # 將檔案移至指定位置
                    move_uploaded_file($file, $dest);
                  }
                } else {
                  echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
                }

              
                //rename($dest,"xlsx/ALL.xlsx");

                //require_once("dbtools.inc.php");
                //$link = create_connection();
                //$table="dynamiclist";
                //$sql = "TRUNCATE TABLE `$table`";
                //$result = execute_sql($link, "tw1_yssales", $sql);
                mysqli_free_result($result);
                mysqli_close($link);//關閉資料庫連線

                //header("location:xlsx2csv.php")
                
?>
	</body>
</html>