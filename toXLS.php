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
$writer->writeToFile('output.xlsx');
?>

