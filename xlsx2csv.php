<?php
require '/home/tw1/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// 輸入的 XLSX 檔案路徑
$inputFile = 'xlsx/ALL.xlsx';

// 讀取 XLSX 檔案
$spreadsheet = IOFactory::load($inputFile);

// 選擇要讀取的工作表（預設為第一個工作表）
$worksheet = $spreadsheet->getActiveSheet();

// 取得所有資料行
$rows = $worksheet->toArray();

// 刪除前四行和最後一行
$rows = array_slice($rows, 4, -1);

// 準備輸出的 CSV 檔案路徑
$outputFile = 'csv/ALL.csv';

// 開啟 CSV 檔案以寫入
$file = fopen($outputFile, 'w');

// 設定編碼為 UTF-8
fwrite($file, "\xEF\xBB\xBF"); // BOM 字元，用於指定 UTF-8 編碼

// 將每一行資料寫入 CSV 檔案
foreach ($rows as $row) {
    fputcsv($file, $row);
}

// 關閉 CSV 檔案
fclose($file);

header("location:import.php")
?>
