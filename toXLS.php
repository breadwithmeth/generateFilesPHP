<?php
//min 72
//require_once 'Spreadsheet/Excel/Writer.php';
include_once("xlsxwriter.class.php");
$table = [];
for($i=1; $i<100; $i++){
    array_push($table, [1,2,3]);

}


$writer = new XLSXWriter();
$writer->writeSheet($table);
$temp_file = tempnam(sys_get_temp_dir(), 'test.xls');
$writer->writeToFile($temp_file);
if (file_exists($temp_file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="test.xls"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));
    readfile($temp_file);
    exit;
}

?>

